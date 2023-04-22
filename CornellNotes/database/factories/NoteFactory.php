<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Topic;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $topic = Topic::inRandomOrder()->first();
        return [
            'title' => fake()->word(),
            'content' => fake()->paragraph(),
            'keyWords' => implode(',', fake()->words()),
            'summary' => fake()->paragraph(),
            'creation_date' => fake()->date(),
            
            'id_user' => $user->id,
            'id_topic' => $topic->id,
        ];
    }
}
