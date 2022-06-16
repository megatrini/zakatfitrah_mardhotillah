<?php

use App\Http\Controllers\API\MuzakkiController;
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

Route::get('muzakki', [MuzakkiController::class, 'index']);
Route::post('muzakki/store', [MuzakkiController::class, 'store']);
Route::get('muzakki/show/{id}', [MuzakkiController::class, 'show']);
Route::post('muzakki/update/{id}', [MuzakkiController::class, 'update']);
Route::get('muzakki/destroy/{id}', [MuzakkiController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
