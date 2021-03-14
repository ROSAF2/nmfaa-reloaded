<?php

namespace Database\Factories;

use App\Models\Assessment;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssessmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assessment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'course_id' => Course::all()[0]->id,  // Does not work when testing with factories
        ];
    }
}
