<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'holiday_weeks' => $this->faker->numberBetween($min = 0, $max = 4),
            'working_weeks' => $this->faker->numberBetween($min = 10, $max = 20),
        ];
    }
}
