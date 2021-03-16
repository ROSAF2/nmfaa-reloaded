<?php

namespace Tests\Unit;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Assessment;
use App\Models\Week;


class NestedForeachTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        User::factory()->count(1)->create()->each(function ($user) {
            $user->semesters()->saveMany(
                Semester::factory()->count(1)->create(['user_id' => $user->id])->each(function ($semester) {
                    $semester->weeks()->saveMany(
                        Week::factory()->count(16)->create(['semester_id' => $semester->id])
                    );
                })
            );
        });
        
        $this->assertTrue(true);
    }
}
