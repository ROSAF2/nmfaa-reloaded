<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->isbn10,
            'name' => $this->faker->word,
            'school_id' => School::factory(),
        ];
    }
}
