<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name'=>$this->faker->lastname(),
            'first_name'=>$this->faker->firstname(),
            'gender'=>$this->faker->numberBetween(1,3),
            'email'=>$this->faker->safeEmail(),
            'tel'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->city() . $this->faker->streetAddress(),
            'building'=>$this->faker->secondaryAddress(),
            'category_id'=>$this->faker->numberBetween(1,5),
            'detail'=>$this->faker->realText(),
        ];
    }
}
