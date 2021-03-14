<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Assessment;
use App\Models\Week;

// Resets database after each of your tests so that data from a previous test does not interfere with subsequent tests.
// use Illuminate\Foundation\Testing\RefreshDatabase;

class RelationshipsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // use RefreshDatabase;
    private $user, $course, $semester, $assessment, $week;

    public function setup(): void {

        parent::setup();
        

        // Below is an attempt of one-to-many relationships for factories according to the laravel documentation
        // Don't forget the image in the studio 4 folder where there are other ways to handle these factories.


        $this->user = User::factory()
            ->hasSemesters(1)
            ->make();

        // $this->course = Course::factory()
        //     ->hasAssessments(4)
        //     ->make();

        $this->semesters = Semester::factory()
            ->count(1)
            ->forUser()
            ->make();

        // $this->assessments = Assessment::factory()
        //     ->count(4)
        //     ->forCourse()
        //     ->make();

        // $this->semester = Semester::factory()
        //     ->hasWeeks(16)
        //     ->make();
        
        // $this->weeks = Week::factory()
        //     ->count(16)
        //     ->forSemester()
        //     ->make();
    }
    
    public function test_example()
    {
        print($this->user);
        // print($this->course);
        print($this->semesters);
        // print($this->assessments);
        // print($this->semester);
        // print($this->weeks);
        $this->assertTrue(true);
    }

    // public function test_a_course_has_many_assessments()
    // {
    //     $this->assertEquals(4, $this->course->assessments->count());
    // }

    // public function test_an_assessment_has_a_course()
    // {
    //     $this->assertEquals($this->course->name, $this->assessment[0]->course->name);
    // }

    // public function test_a_user_has_many_semesters()
    // {
    //     $this->assertEquals(1, $this->user->semesters->count());
    // }

    // public function test_a_semester_has_a_user()
    // {
    //     $this->assertEquals($this->user->id, $this->semester->user->id);
    // }

    // public function test_a_semester_has_many_weeks()
    // {
    //     $this->assertEquals(16, $this->semester->weeks->count());
    // }

    // public function test_a_week_has_a_semester()
    // {
    //     $this->assertEquals($this->semester->weeks_first_term, $this->week->semester->weeks_first_term);
    // }
}
