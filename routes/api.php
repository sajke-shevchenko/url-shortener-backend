<?php

use App\Http\Controllers\UrlController;
use App\Http\Controllers\VisitController;
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

Route::get('/urls', [UrlController::class, 'index']);
Route::post('/urls', [UrlController::class, 'store']);
Route::get('/urls/{url}', [UrlController::class, 'show']);
Route::post('/visits/{short}', [VisitController::class, 'store']);
