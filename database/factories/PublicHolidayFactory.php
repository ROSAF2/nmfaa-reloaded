<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\PublicHoliday;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicHolidayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PublicHoliday::class;

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
            'location_affected' => $this->faker->word,
            'school_id' => School::factory(),
        ];
    }
}
