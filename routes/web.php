<?php

use App\Http\Livewire\MyDashboard\TravelOrderPrint;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TravelOrder;
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

Route::get('auth/google', 'App\Http\Controllers\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'App\Http\Controllers\GoogleController@handleGoogleCallback');

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/mydashboard', function () {
        return view('my-dashboard');
    })->name('mydashboard');
    Route::get('/transactions', function () {
        return view('transactions');
    })->name('trans');
    
    // Travel Order
    Route::get('/create-travel-order', TravelOrder::class)
    ->name('travel-order');
    // Route::get('print-travel-order/{id}', TravelOrderPrint::class)
    // ->name('print-travel-order');

    //Cash Advances
    Route::get('/cash-advance/activity', function (){
        return view('activity-cash-advances');
    })
    ->name('ca-activity');

    //mydashboard links

    Route::get('/mydashboard/travelorders', function (){
        return view('pages.my-dashboard.travel-orders');
    })
    ->name('mytravelorders');
});






Route::view('/401-page', 'errs.401-page')->name('401-error');   

Route::middleware(['auth:sanctum', 'verified'])->get('redirects', 'App\Http\Controllers\HomeController@index')->name('redirect');

