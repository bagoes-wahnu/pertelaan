<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PertelaanController;

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

Route::get('/pertelaan/json', [PertelaanController::class,'json'])->name('pertelaan.json');
Route::get('/pertelaan/show_json/{gid}', [PertelaanController::class,'show_json'])->name('pertelaan.show.json');
Route::post('/pertelaan/store_json/{gid}', [PertelaanController::class,'store_json'])->name('pertelaan.store.json');
Route::delete('/pertelaan/delete_json/{gid}', [PertelaanController::class,'delete_json'])->name('pertelaan.delete.json');