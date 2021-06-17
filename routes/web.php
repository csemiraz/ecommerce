<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\DashboardController as UserDashboard;

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
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__.'/auth.php';


//Admin Route
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//User Route
Route::group(['as'=>'user.', 'prefix'=>'user', 'namespace'=>'User', 'middleware'=>['auth','user']], function() {
    Route::get('dashboard', [UserDashboard::class, 'index'])->name('dashboard');
});
