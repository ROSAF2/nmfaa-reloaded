<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
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
    $user = User::factory()->create(); // 1 user
    $semester = Semester::factory()->create(['user_id' => $user->id]); // 1 Semester
    $weeks = [];
    // 16 weeks
    for ($i=0; $i < 16; $i++) { 
        $weeks[] = Week::factory()->create(['number' => ($i + 1),'semester_id' => $semester->id]); 
    }
    return [$user,$semester,$weeks];
});

Route::resource('courses', CourseController::class);