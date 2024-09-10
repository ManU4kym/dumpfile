<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'loaned' => $this->faker->boolean,
            'due_date' => $this->faker->optional()->date(),
            'return_date' => $this->faker->optional()->date(),
            'user_id' => $this->faker->optional()->numberBetween(1, 100), 
            'staff_name' => $this->faker->name,
            'staff_email' => $this->faker->email,
            'staff_id' => $this->faker->uuid,
        ];
    }
}
