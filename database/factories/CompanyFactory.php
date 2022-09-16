<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $country_id = rand(1, 20);
        return [
            'name' => $this->faker->company(),
            'type' => $this->faker->words(),
            'website_link' => $this->faker->url(),
            'registration_number' => $this->faker->randomDigitNotZero(),
            'country_id' => $country_id
        ];
    }
}