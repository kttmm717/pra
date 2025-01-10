<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\CustomRegisterdUserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ContactController;

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

Route::post('/register', [CustomRegisterdUserController::class, 'store']);

Route::middleware('auth')->group(function () {
     Route::get('/admin', [AuthController::class, 'admin']);
});

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::get('/find', [ContactController::class, 'search']);

Route::get('/export', [ExportController::class, 'export']);

Route::delete('/delete', [ContactController::class, 'delete']);





