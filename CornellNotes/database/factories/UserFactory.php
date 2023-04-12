<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Career;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->firstName();
        $var1 = fake()->randomElement(['1807', '1907', '2007', '2107', '2207']);
        $var2 = fake()->unique()->randomNumber(4, true);
        $control = $var1.$var2;
        $fLetters = strtoupper(substr($name,0,3));
        $career = Career::inRandomOrder()->first();
        return [
            'name' => $name,
            'lastName' => fake()->lastName(),
            'controlNumber' =>  $control,
            'email' =>strtolower($name).'.'.$control."@itsmotul.edu.mx",
            'password' => $fLetters.$control,

            'id_career' => $career->id,


            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

