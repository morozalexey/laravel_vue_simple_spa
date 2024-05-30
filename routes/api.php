<?php

use App\Http\Controllers\People\PeopleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'App\Http\Controllers\People', 'prefix'=>'people'], function () {
    Route::get('/', [PeopleController::class, 'index']);
    Route::get('/{person}', [PeopleController::class, 'show']);
    Route::post('/', [PeopleController::class, 'store']);
    Route::patch('/{person}', [PeopleController::class, 'update']);
    Route::delete('/{person}', [PeopleController::class, 'destroy']);
});
