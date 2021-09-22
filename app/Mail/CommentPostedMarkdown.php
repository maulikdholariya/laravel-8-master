<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;

class CommentPostedMarkdown extends Mailable 
{
    use Queueable, SerializesModels;


    /* .env update
        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        QUEUE_CONNECTION=database
        SESSION_DRIVER=file
        SESSION_LIFETIME=120
    *php artisan queue:table
    */

    /**
     * Create a new message instance.
     *php artisan make:mail CommentPostedMarkdown --markdown=emails.posts.commented-markdown
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Commented was posted on your {$this->comment->commentable->title} blog post";
        return $this->subject($subject)
            ->markdown('emails.posts.commented-markdown');
    }
}
