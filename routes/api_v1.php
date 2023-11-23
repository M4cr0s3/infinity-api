<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\MentorController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\StatsController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\AdvantageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'advantages'], function () {
    Route::get('/get_all', [AdvantageController::class, 'getAdvantages']);
});

Route::get('/get_stats', [StatsController::class, 'getAllStats']);
Route::get('/get_reviews', [ReviewController::class, 'getAllReviews']);
Route::get('/get_mentors', [MentorController::class, 'getMentors']);
Route::get('/get_courses', [CourseController::class, 'getCourses']);
Route::get('/get_course/{id}', [CourseController::class, 'getCourse']);


Route::group(['prefix' => 'user', 'middleware' => 'api'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refreshToken']);
});

Route::group(['prefix' => 'profile', 'middleware' => 'jwt.auth'], function () {
    Route::get('/get_last_tasks', [ProfileController::class, 'getLastTasks']);

});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/sign_course/{id}', [CourseController::class, 'signOnCourse']);
    Route::get('/check_user_course/{id}', [CourseController::class, 'checkIsUserOnCourse']);
    Route::get('/get_user_courses/{id}', [CourseController::class, 'userCourses']);
});
