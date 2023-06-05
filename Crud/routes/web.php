<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/api/enrollment', function() {
    $enrollments = App\Models\Enrollment::all();
    return $enrollments->toJson();
});

Route::post('/api/enrollment/store', [DataController::class, 'store'])->name('enrollment.submit');
Route::delete('/api/enrollment/{id}', [DataController::class, 'destroy']);
Route::put('/api/enrollment/{id}', [DataController::class, 'update'])->name('enrollment.update');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', [EnrollmentController::class, 'create']);

Route::delete('/enrollments/delete/{id}', 'EnrollmentController@destroy');

Route::get('/', function () {
    return view('enrollment-form');
});









