<?php

use App\Http\Controllers\api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/add_student', [StudentController::class, 'store']);
Route::get('/get_student', [StudentController::class, 'index']);
Route::delete('destroy/{id:slug}', [StudentController::class, 'destroy']);
Route::post('/new_session', []);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
