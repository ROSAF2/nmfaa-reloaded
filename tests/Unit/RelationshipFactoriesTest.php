<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\User;
use App\Models\School;
use App\Models\Course;
use App\Models\Assessment;
use App\Models\PublicHoliday;
use App\Models\Semester;
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

    public function setup(): void {

        parent::setup();

        // User
        $this->user = User::factory()->create(); // 1 user

        // School
        $this->school = School::factory()->create(); // 1 school

        // Course - Assessment
        $this->course = Course::factory()->create(['school_id' => $this->school->id]); // 1 course
        $this->assessments = Assessment::factory()->count(4)->create(['course_id' => $this->course->id]); // 4 assessments

        // Semester - Week ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        $this->semester = Semester::factory()->create(['user_id' => $this->user->id, 'school_id' => $this->school->id]); // 1 semester
        
        $this->total_weeks = $this->school->holiday_weeks + $this->school->working_weeks;
        $this->weeks = [];
        for ($i=0; $i < $this->total_weeks; $i++) { 
            // If holiday week
            if ($this->semester->weeks_first_term < ($i + 1) && ($i + 1) < ($this->semester->weeks_first_term + $this->semester->holiday_weeks)) {
                $this->weeks[] = Week::factory()->create(['number' => null, 'is_holiday_week' => true, 'semester_id' => $this->semester->id]); 
            }
            // If working week
            else {
                if (($i + 1) <= $this->semester->weeks_first_term) $this->weeks[] = Week::factory()->create(['number' => ($i + 1), 'is_holiday_week' => false, 'semester_id' => $this->semester->id]); // If first term
                else $this->weeks[] = Week::factory()->create(['number' => (($i + 1) - $this->semester->school->holiday_weeks), 'is_holiday_week' => false, 'semester_id' => $this->semester->id]); // If second term
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // Public Holiday
        $this->publicHoliday = PublicHoliday::factory()->create(['school_id' => $this->school->id]); // 1 public holiday
    }

    // Course - Assessment
    public function test_a_course_has_many_assessments()
    {
        $this->assertEquals(4, $this->course->assessments->count());
    }

    public function test_an_assessment_has_a_course()
    {
        $this->assertEquals($this->course->name, $this->assessments[0]->course->name);
    }

    // User - Semester
    public function test_a_user_has_many_semesters()
    {
        $this->assertEquals(1, $this->user->semesters->count());
    }

    public function test_a_semester_has_a_user()
    {
        $this->assertEquals($this->user->id, $this->semester->user->id);
    }

    // School Relationships ---------------------------------------------------
    // School - Semester
    public function test_a_school_has_many_semesters()
    {
        $this->assertEquals(1, $this->school->semesters->count());
    }

    public function test_a_semester_has_a_school()
    {
        $this->assertEquals($this->school->id, $this->semester->school->id);
    }

    // School - Course
    public function test_a_school_has_many_courses()
    {
        $this->assertEquals(1, $this->school->courses->count());
    }

    public function test_a_course_has_a_school()
    {
        $this->assertEquals($this->school->id, $this->course->school->id);
    }

    // School - PubliHoliday
    public function test_a_school_has_many_publicHolidays()
    {
        $this->assertEquals(1, $this->school->publicHolidays->count());
    }

    public function test_a_publicHoliday_has_a_school()
    {
        $this->assertEquals($this->school->id, $this->publicHoliday->school->id);
    }
    // --------------------------------------------------------------------------

    // Semester - Week
    public function test_a_semester_has_many_weeks()
    {
        $this->assertEquals($this->total_weeks, $this->semester->weeks->count());
    }

    public function test_a_week_has_a_semester()
    {
        $this->assertEquals($this->semester->weeks_first_term, $this->weeks[0]->semester->weeks_first_term);
    }
}
