<?php

use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/developers', [UserController::class, 'index'] ); // Quando non c'è l'id si prende l'intera tabella degli utenti (developer)
Route::get('/developers/{id}', [UserController::class, 'index'] ); // Modificato da developers a developers/{id} perchè nell'url si passano gli id
Route::get('/developer/{id}', [UserController::class, 'show']);  //Modifica da developers/{id} a developer/{id} per conflitto con quello sopra
Route::get('/technologies', [TechnologyController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{AvgVote}', [ReviewController::class, 'index']);
Route::get('/review/{comments}', [ReviewController::class, 'show']);
Route::post('/reviews/store', [ReviewController::class, 'storeReview']);
