<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssessmentController;
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
    // Semester::factory()->forUser()->create(); // another way

    // $user = User::find(2);
    // $user->delete();

    // return [User::all(), Semester::all()];
    return "She'll be right mate, no worries!";
});

Route::resource('courses', CourseController::class);
Route::resource('assessments', AssessmentController::class);