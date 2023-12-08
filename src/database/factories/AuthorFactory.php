<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $createdAt = $this->faker->dateTimeBetween('-1 month', 'now');

        return [
            'full-name' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->unique()->safeEmail(),
            'postcode' => $this->faker->randomNumber(7),
            'address' => $this->faker->city(),
            'building_name' => $this->faker->word(10),
            'opinion' => $this->faker->text(50),
            'created_at' => $createdAt,
            'updated_at' =>$this->faker->dateTimeBetween($createdAt, 'now'),
        ];
    }
}
