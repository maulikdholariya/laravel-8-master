<?php

namespace App\Providers;

use App\Http\ViewComposers\ActivityComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\BlogPost;
use App\Observers\BlogPostObserver;
use App\Models\Comment;
use App\Observers\CommentObserver;
use App\Services\Counter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
        //aliases
        Blade::aliasComponent('components.badge','badge');
        Blade::aliasComponent('components.updated','updated');
        Blade::aliasComponent('components.card','card');
        Blade::aliasComponent('components.tags','tags');
        Blade::aliasComponent('components.errors','errors');
        Blade::aliasComponent('components.comment-form','commentForm');
        Blade::aliasComponent('components.comment-list','commentList');




        // view()->composer('*', ActivityComposer::class);
        view()->composer(['posts.index','posts.show'], ActivityComposer::class);

        BlogPost::observe(BlogPostObserver::class);
        Comment::observe(CommentObserver::class);

        // $this->app->bind(Counter::class, function ($app){
        //     return new Counter(5);
        // });

        $this->app->singleton(Counter::class, function ($app){
            return new Counter(
                $app->make('Illuminate\Contracts\Cache\Factory'),
                $app->make('Illuminate\Contracts\Session\Session'),
                5);
        });

        // $this->app->when(Counter::class)
        //         ->needs('$timeout')
        //         ->give('5');

        $this->app->bind(

            'App\Contracts\CounterContract',Counter::class
        );
    }
}

