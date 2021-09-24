<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$UScrWpVie.jEUDnYkVpHK.b53vyK6eetWJlqjDz1NUQSRPVrPi1C6', // 12345678
            'api_token' => Str::random(80),
            'remember_token' => Str::random(10),
            'is_admin' => false
        ];
    }

    //blow state override
    public function newUser()
    {
        return $this->state(function(array $attributes){
            return [
                'name' => 'Test',
                'email' => 'test@gmail.com',
                'is_admin' => true
            ];
        });
    }
}
