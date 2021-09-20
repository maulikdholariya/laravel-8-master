<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    // save with relational data
    public function configure()
    {
        return $this->afterCreating(function(Author $author){
            $author->profile()->save(Profile::factory()->make());
        });
    }

    ////Author::factory()->create();
}
