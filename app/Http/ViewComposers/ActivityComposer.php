<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\BlogPost;
use App\Models\User;

class ActivityComposer
{
    public function compose(View $view)
    {
        $mostCommented=Cache::remember('blog-post-commented', now()->addSecond(10), function () {
            return  BlogPost::mostCommented()->take(5)->get();
        });
        $mostActive=Cache::remember('user-most-active', now()->addSecond(10), function () {
            return  User::withMostBlogPosts()->take(5)->get();
        });
        $mostActiveLastMonth=Cache::remember('users-most-active-last-month', now()->addSecond(10), function () {
            return  User::withMostBlogPostsLastMonth()->take(5)->get();
        });

        $view->with('mostCommented', $mostCommented);
        $view->with('mostActive' , $mostActive);
        $view->with('mostActiveLastMonth' , $mostActiveLastMonth);


    }
}
