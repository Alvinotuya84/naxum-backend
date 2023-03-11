<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ContactsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [LoginController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::patch('/update-profile',[LoginController::class,'update']);
    Route::post('/logout',[LoginController::class,'logout']);
    Route::resource('contacts', ContactsController::class);
    Route::post('/search/contacts',[ContactsController::class,'search']);



});
