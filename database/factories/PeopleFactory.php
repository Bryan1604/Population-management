<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
//use Illuminate\Support\Facades\Factory as Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
            return [
                'household_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
                'fullname' => $this->faker->name,
                'sex' => $this->faker->randomElement([0, 1]),
                'birthday' => $this->faker->date,
                'place_of_birth' =>$this->faker->city,
                'ethnic' => $this->faker->word,
                'job' => $this->faker->jobTitle,
                'office' =>$this->faker->company,
                'identify_number' =>$this->faker->numerify('############'),
                'received_IDCard_place' =>$this->faker->city,
                'received_IDCard_time' => $this->faker->date,
                'phone_number' => $this->faker->phoneNumber,
                'domicile' => $this->faker->city,
                'address_before' =>$this->faker->address,
                'household_owner_relationship' =>$this->faker->randomElement(['Father', 'Mother', 'Sibling']),
                'state' =>$this->faker->randomElement([0, 1, 2]),
                'note' => $this->faker->sentence,
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ];

    }
}
