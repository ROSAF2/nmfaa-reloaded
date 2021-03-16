<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Assessment;
use App\Models\Week;

// Resets database after each of your tests so that data from a previous test does not interfere with subsequent tests.
// use Illuminate\Foundation\Testing\RefreshDatabase;

class RelationshipFactoriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    // use RefreshDatabase;
    // private $user, $course, $semester, $assessment, $week;

    public function setup(): void {

        parent::setup();

        $this->course = Course::factory()->create(); // 1 course
        $this->assessments = Assessment::factory()->count(4)->create(['course_id' => $this->course->id]); // 4 assessments

        // count() resturns a list/array
        $this->user = User::factory()->create(); // 1 user
        $this->semester = Semester::factory()->create(['user_id' => $this->user->id]); // 1 Semester
        
        // 16 weeks
        $this->weeks = [];
        for ($i=0; $i < 16; $i++) { 
            $this->weeks[] = Week::factory()->create(['number' => ($i + 1),'semester_id' => $this->semester->id]); 
        }
    }

    public function test_a_course_has_many_assessments()
    {
        $this->assertEquals(4, $this->course->assessments->count());
    }

    public function test_an_assessment_has_a_course()
    {
        $this->assertEquals($this->course->name, $this->assessments[0]->course->name);
    }

    public function test_a_user_has_many_semesters()
    {
        $this->assertEquals(1, $this->user->semesters->count());
    }

    public function test_a_semester_has_a_user()
    {
        $this->assertEquals($this->user->id, $this->semester->user->id);
    }

    public function test_a_semester_has_many_weeks()
    {
        $this->assertEquals(16, $this->semester->weeks->count());
    }

    public function test_a_week_has_a_semester()
    {
        $this->assertEquals($this->semester->weeks_first_term, $this->weeks[0]->semester->weeks_first_term);
    }
}
