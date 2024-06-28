<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginRequest'])->name('loginRequest');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerRequest'])->name('registerRequest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/homepage', [ServiceController::class, 'index'])->name('homepage');

Route::group(['middleware' => 'check.user', 'prefix' => 'service', 'as' => 'service.'], function () {
    Route::get('/paket-data', [ServiceController::class, 'paket'])->name('paket-data');
    Route::get('/pulsa', [ServiceController::class, 'paket'])->name('pulsa');
    Route::get('/listrik-pln', [ServiceController::class, 'paket'])->name('listrik-pln');
    Route::get('/air', [ServiceController::class, 'paket'])->name('air');
    Route::get('/telepon', [ServiceController::class, 'paket'])->name('telepon');
    Route::get('/asuransi', [ServiceController::class, 'paket'])->name('asuransi');
    Route::get('/tv', [ServiceController::class, 'paket'])->name('tv');
    Route::get('/tiket', [ServiceController::class, 'paket'])->name('tiket');
    Route::get('/lainya', [ServiceController::class, 'paket'])->name('lainya');

});

Route::post('/payment', [PaymentController::class, 'index'])->name('payment');