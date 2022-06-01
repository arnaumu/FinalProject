<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/create-server', function () {
    return view('newServer');
});

Route::get('/server-logs/{idServer}', function ($idServer) {
    return view('logs', ['idServer' => $idServer]);
})->name('logs');

Route::get('/server-edit/{idServer}', function ($idServer) {
    return view('editServer', ['idServer' => $idServer]);
})->name('editServer');
Route::get('/create-log/{idServer}', function ($idServer) {
    return view('newLog', ['idServer' => $idServer]);
})->name('newLog');

Route::get('/log-edit/{idServer}/{idLog}', function ($idServer, $idLog) {
    return view('editLog', ['idServer' => $idServer, 'idLog' => $idLog]);
})->name('editLog');
