<?php

namespace App\Models;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['user_id','content'];

    public function blogPost()
    {
        // return $this->belongsTo(BlogPost::class, 'post_id', 'blog_post_id');

        return $this->belongsTo(BlogPost::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }
    // delete relational comments in blog post
    public static function boot()
    {
        parent::boot();
        // static::addGlobalScope(new LatestScope);
        static::creating(function(Comment $comment){
            Cache::forget("blog-post-{$comment->blog_post_id}");
            Cache::forget("mostCommented");
        });
    }

}
