<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ServerLogController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // Route::resource('server', ServerController::class, ['except' => ['edit', 'create']]);
    // Route::resource('log', LogController::class, ['only' => ['index', 'show']]);
    // Route::resource('serverlog', ServerLogController::class, ['except' => ['show', 'edit', 'create']]);

    Route::get('/servers', [ServerController::class, 'index']);
    Route::get('/server/{id}', [ServerController::class, 'show']);
    Route::delete('/delete-server/{id}', [ServerController::class, 'destroy']);
    Route::post('/new-server', [ServerController::class, 'store']);
    Route::put('/edit-server/{id}', [ServerController::class, 'update']);

    Route::get('/logs-server/{idServer}', [ServerLogController::class, 'index']);
    Route::post('/new-log/{idServer}', [ServerLogController::class, 'store']);
    Route::delete('/delete-log/{idServer}/{idLog}', [ServerLogController::class, 'destroy']);
    Route::put('/edit-log/{idServer}/{idLog}', [ServerLogController::class, 'update']);

    Route::get('/get-log/{id}', [LogController::class, 'show']);

});