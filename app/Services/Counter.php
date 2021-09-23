<?php

namespace App\Services;

// use Illuminate\Support\Facades\Cache;

use App\Contracts\CounterContract;
use Illuminate\Contracts\Cache\Factory as Cache;
use Illuminate\Contracts\Session\Session;
class Counter implements CounterContract
{
    private $timeout;
    private $cache;
    private $session;

    public function __construct(Cache $cache, Session $session, int $timeout)
    {
        $this->cache= $cache;
        $this->session =$session;
        $this->timeout = $timeout;
    }

    public function increment(string $key, array $tags = null):int
    {


        $sessionId = $this->session->getId();
        $counterKey = "{$key}-counter";
        $usersKey = "{$key}-users";

        $users = $this->cache->get($usersKey, []);
        $usersUpdate = [];
        $diffrence = 0;
        $now = now();

        foreach ($users as $session => $lastVisit) {
            if ($now->diffInMinutes($lastVisit) >= $this->timeout) {
                $diffrence--;
            } else {
                $usersUpdate[$session] = $lastVisit;
            }
        }
        if(
            !array_key_exists($sessionId, $users)
            || $now->diffInMinutes($users[$sessionId]) >= $this->timeout
        ) {
            $diffrence++;
        }

        $usersUpdate[$sessionId] = $now;
        $this->cache->forever($usersKey, $usersUpdate);

        if (!$this->cache->has($counterKey)) {
            $this->cache->forever($counterKey, 1);
        } else {
            $this->cache->increment($counterKey, $diffrence);
        }

        return $counter =  $this->cache->get($counterKey);
    }
}

?>
