<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Top;
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

Route::get('/', [Top::class, 'index'])->name('user.baseUrl');

/* User Routes Start */

// Authentication
Route::match(['get', 'post'], '/auth/login', [Auth::class, 'login'])->name('user.login');
Route::match(['get', 'post'], '/auth/register', [Auth::class, 'register'])->name('user.register');

/* User Routes End */

