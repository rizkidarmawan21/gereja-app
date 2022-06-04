<?php

use App\Http\Controllers\Admin\CapacityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\JemaatController;
use App\Http\Controllers\Admin\RegIbadahController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/my-event',[HomeController::class,'myEvent'])->name('my-event')->middleware('auth');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');
Route::get('/profile',[HomeController::class,'profile'])->name('profile')->middleware('auth');
Route::post('/profile/update',[ProfileController::class,'update'])->name('profile.update')->middleware('auth');
Route::post('/profile/updatePassword',[ProfileController::class,'updatePassword'])->name('profile.update.password')->middleware('auth');
Route::get('/ticket', [CheckoutController::class, 'ticket'])->name('ticket');

Route::prefix('admin')
    // ->namespace('App\Http\Controllers\Admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/', [DashboardController::class,'index'])->name('dashboard');
        Route::resource('event', EventController::class);
        Route::resource('jemaat', JemaatController::class);
        Route::post('capacity/store/{eventID}', [CapacityController::class, 'store'])->name('capacity.store');
        Route::resource('capacity', CapacityController::class)->except('store');
        Route::get('/reg_ibadah/byEvent/{eventID}', [RegIbadahController::class,'byEvent'])->name('byEvent');
        Route::resource('reg_ibadah', RegIbadahController::class);
        // Route::resource('transaction', 'TransactionController');
    });

Auth::routes();

