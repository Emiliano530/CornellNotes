<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reminder>
 */
class ReminderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $user = User::inRandomOrder()->first();
        $subject = Subject::inRandomOrder()->first();
        return [
            'title' => fake()->word(),
            'content' => fake()->sentence(),
            'value' => fake()->randomElement(['1','2','3','4']),
            'creation_date' => fake()->date(),
            'event_date' => fake()->date(),

            'id_user' => $user->id,
            'id_subject' => $subject->id,
        ];
    }
}
