<?php

namespace Database\Factories;

use App\Models\Week;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeekFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Week::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $semesters = Semester::pluck('id')->toArray();     // Together

        return [
            'number' => $this->faker->numberBetween($min = 1, $max = 16), // Watch out! the same number can repeat 
            'semester_id' => Semester::factory(), // Used for the NestedForeach
            // 'semester_id' => $this->faker->randomElement($semesters),  // Together
        ];
    }
}
