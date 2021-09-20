<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('users')->insert([
        //     'name' => 'Jon',
        //     'email' => 'jon@fsdfsd.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5', // password
        //     'remember_token' => 'testgfdgd',
        // ]);
        // $doe = \App\Models\User::factory()->newUser()->create();
        // $else = \App\Models\User::factory(20)->create();


        // // dd(get_class($doe), get_class($else));
        // $users = $else->concat([$doe]);

        // // dd($users->count());

        // $posts = \App\Models\BlogPost::factory(50)->make()->each(function($post) use($users){
        //     $post->user_id = $users->random()->id;
        //     $post->save();
        // });

        // $comments = \App\Models\Comment::factory(150)->make()->each(function($comment) use($posts){
        //     $comment->blog_post_id = $posts->random()->id;
        //     $comment->save();

        // });
        // Cache::tags(['blog-post'])->flush();
        if($this->command->confirm('Do you want to refresh the database?')){
            $this->command->call('migrate:refresh');
            $this->command->info('Database was refreshed');
        }
        $this->call([
            UsersTableSeeder::class,
            BlogPostsTableSeeder::class,
            CommentsTableSeeder::class,
            TagsTableSeeder::class,
            BlogPostTagTableSeeder::class,

            ////composer dump-autoload
        ]);


    }

    //////php artisan db:seed
}
