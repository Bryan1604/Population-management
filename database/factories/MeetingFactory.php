<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'time'=> $this ->faker->dateTime(),
            'place' => $this->faker->address(),
            'title' => $this->faker->title(),
            'number_of_participants' => $this->faker->numberBetween(10,100),
            'status' => $this->faker->randomElement([0,1]),
        ]; 
    }
}
