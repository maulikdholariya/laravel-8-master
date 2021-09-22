<?php

namespace App\Listeners;

use App\Events\CommentPosted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\NotifyUsersPostWasCommented;

class NotifyUsersAboutComment
{
    /**
     * Create the event listener.
     * php artisan make:listener NotifyUsersAboutComment
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentPosted $event)
    {
        // dd('I was called in response to an event');
        // ThrottledMail::dispatch(new CommentPostedMarkdown($comment), $post->user);
        NotifyUsersPostWasCommented::dispatch($event->comment);
    }
}
