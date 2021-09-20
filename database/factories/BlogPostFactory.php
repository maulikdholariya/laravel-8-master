<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            // 'content' => $this->faker->paragraphs(1,true),
            'content' => $this->faker->sentence(5),
            // 'user_id' => $this->faker->unique()->numberBetween(1,20),
        ];
    }
    //blow state override
    public function newtitle()
    {
        return $this->state(function(array $attributes){
            return [
                'title' => 'New title',
                // 'content'=>'New content',
                // 'user_id' => 1
            ];
        });
    }

    ///BlogPost::factory()->newTitle()->create();
}
