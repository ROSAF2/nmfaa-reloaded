<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\School;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Semester::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //
        // $users = User::pluck('id')->toArray(); // Together

        return [
            'name' => $this->faker->word,
            'start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'weeks_first_term' => $this->faker->numberBetween($min = 6, $max = 11),
            'user_id' => User::factory(), // Used for the NestedForeach
            'school_id' => School::factory(),
            // 'user_id' => $this->faker->randomElement($users), // Together
        ];
    }
}
