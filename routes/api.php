<?php

use App\Http\Controllers\KodeAkunController;
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

Route::prefix('/v1')->group(function(){
    Route::controller(KodeAkunController::class)->group(function(){
        Route::get('/kode-akun','fetch');
        Route::get('/kode-akun/{id}','get');
        Route::post('/kode-akun','store');
        Route::post('/kode-akun/update','update');
        Route::delete('/kode-akun/{id}','destroy');
    });
});
