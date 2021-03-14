<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Assessment;
use App\Models\Week;

class RelationshipsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    // public function setup(){
    //     parent::setup();
        

    // }
    
    public function test_a_course_has_many_assessments()
    {
        $course = Course::find("3547144957");
        $this->assertEquals(4, $course->assessments->count());
    }

    public function test_an_assessment_has_a_course()
    {
        $assessment = Assessment::find(1);
        $this->assertEquals("dolores", $assessment->course->name);
    }

    public function test_a_user_has_many_semesters()
    {
        $user = User::find(1);
        $this->assertEquals(1, $user->semesters->count());
    }

    public function test_a_semester_has_a_user()
    {
        $semester = Semester::find(1);
        $this->assertEquals(1, $semester->user->id);
    }

    public function test_a_semester_has_many_weeks()
    {
        $semester = Semester::find(1);
        $this->assertEquals(16, $semester->weeks->count());
    }

    public function test_a_week_has_a_semester()
    {
        $week = Week::find(1);
        $this->assertEquals(8, $week->semester->weeks_first_term);
    }
}
