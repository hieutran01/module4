<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
    
        return [
            'name' => $faker->sentence,
            'isbn' => $faker->isbn13,
            'tacgia' => $faker->name,
            'theloai' => $faker->randomElement(['Fiction', 'Non-Fiction']),
            'sotrang' => $faker->numberBetween(100, 500),
            'namsanxuat' => $faker->year,
        ];
    }
    
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}