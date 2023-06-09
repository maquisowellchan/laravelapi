<?php

use App\Http\Controllers\SampleUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/enrollment/store', [DataController::class, 'store']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api', 'role:user'])->group(function () {
    Route::get('/enrollments', 'GetDataController@index');
});

Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::post('/enrollment', [EnrollmentController::class, 'submit']);
    Route::delete('/enrollments/{id}', 'Api\EnrollmentController@destroy');
});





Route::delete('/enrollments/delete/{id}', 'EnrollmentController@destroy');




Route::get('2/user/{id}', [SampleUserController::class, 'user']);
Route::post('2/login', [SampleUserController::class, 'login']);
Route::post('2/register', [SampleUserController::class, 'create']);
Route::put('2/update', [SampleUserController::class, 'update']);
Route::delete('2/delete', [SampleUserController::class, 'delete']);

