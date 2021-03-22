<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\PublicHolidayController;

use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Assessment;
use App\Models\Week;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // Examples on creating linked Users and semesters
    // User::factory()->hasSemesters(1)->create(); // one way
    User::factory()->create();

    return view('welcome');
    // Semester::factory()->forUser()->create(); // another way

    // $user = User::find(2);
    // $user->delete();

    // return [User::all(), Semester::all()];

    // Timetable
    /*
    $semester = Semester::all();
    $semester = $semester[0];


    $weeks = $semester->weeks;
    $dateNow = date(now());
    $withinSemester = false;

    for ($i=0; $i < $weeks->count(); $i++) { 
        // We define this two variables for readability
        $start =$weeks[$i]->start_date;
        $end = date('Y-m-d', strtotime($start . " +7 day"));

        if ($start <= $dateNow && $dateNow < $end) {
            if ($weeks[$i]->is_holiday_week) echo "We are on holiday break";
            else echo "We are in week " . $weeks[$i]->number;
            $withinSemester = true;
            break;
        }
    }

    // if (!$withinSemester) {
    //     echo "We are not in class at the moment.";
    // }
*/
});



Route::resource('courses', CourseController::class);
Route::resource('assessments', AssessmentController::class);
Route::resource('semesters', SemesterController::class);
Route::resource('publicHolidays', PublicHolidayController::class);