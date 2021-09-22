<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use App\Models\BlogPost;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     * php artisan make:observer CommentObserver --model=Comment
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        if($comment->commentable_type === BlogPost::class){

            Cache::forget("blog-post-{$comment->commentable_id}");
            Cache::forget("mostCommented");
        }
    }

}
