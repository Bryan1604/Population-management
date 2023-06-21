<?php

namespace Database\Factories;

use App\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
//use Illuminate\Support\Facades\Factory as Factory;
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
                'time' => $this->faker->date,
                'place' =>$this->faker->address,
                'title' => $this->faker->Title,
                'number_of_paticipants' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
                'status' =>$this->faker->randomElement([0, 1]),
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ];

    }
}
