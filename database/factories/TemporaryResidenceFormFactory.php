<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TemporaryResidenceForm>
 */
class TemporaryResidenceFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'people_id' => $this->faker->numberBetween(1, 20),
            'address'=>$this->faker->address,
            'reason'=>$this->faker->sentence,
            'note' => $this->faker->sentence,
        ];
    }
}
