<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fullAddress = $this->faker->address;
        $addressParts = explode(' ', $fullAddress);
        $building = isset($addressParts[3]) ? $addressParts[3] : null;

        $number = $this->faker->phoneNumber;
        $tell = implode('', preg_split('/\D+/', $number));

        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail,
            'tell' => $tell,
            'address' => $addressParts[2],
            'building' => $building,
            'detail' => $this->faker->realText(120),
        ];
    }
}
