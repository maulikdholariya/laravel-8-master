<?php

 namespace App\Facedes;

use Illuminate\Support\Facades\Facade;

/**
 * @method static int increment( 'Stirng $key', Array $tags = null);
 */
class CounterFacede extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'App\Contracts\CounterContract';
    }
}

?>
