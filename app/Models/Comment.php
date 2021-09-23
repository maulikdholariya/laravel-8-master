<?php

namespace App\Models;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Traits\Taggable;

class Comment extends Model
{
    use SoftDeletes, Taggable;
    use HasFactory;
    protected $fillable = ['user_id','content'];

    protected $hidden = ['deleted_at', 'commentable_type', 'commentable_id', 'user_id'];

    // public function blogPost()
    // {
    //     // return $this->belongsTo(BlogPost::class, 'post_id', 'blog_post_id');

    //     return $this->belongsTo(BlogPost::class);
    // }
    public function commentable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     //move to Taggable traits
    // public function tags()
    // {
    //     return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    // }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }
    // delete relational comments in blog post
    // public static function boot()
    // {
    //     parent::boot();
    //     // static::addGlobalScope(new LatestScope);
    //     // static::creating(function(Comment $comment){

    //     //     // dump($comment);
    //     //     // dump($comment->commentable_type);
    //     //     // dd(BlogPost::class);
    //     //     // Cache::forget("blog-post-{$comment->blog_post_id}");
    //     //     if($comment->commentable_type === BlogPost::class){

    //     //         Cache::forget("blog-post-{$comment->commentable_id}");
    //     //         Cache::forget("mostCommented");
    //     //     }

    //     // });
    //     ///add in CommentObserver


    // }

}
