<?php

namespace Database\Factories;

use App\Models\Semester;
use App\Models\User;
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
            'weeks_first_term' => $this->faker->randomDigitNot(0),
            'holiday_weeks' => $this->faker->numberBetween($min = 0, $max = 6),
            'working_weeks' => $this->faker->numberBetween($min = 10, $max = 20),
            'user_id' => User::factory(), // Used for the NestedForeach
            // 'user_id' => $this->faker->randomElement($users), // Together
        ];
    }
}
