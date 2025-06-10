<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);

    // Route::get('/subscribe', [SubscriptionController::class, 'index']);
    // Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);

    Route::get('/plans', [SubscriptionController::class, 'index'])->name('plans');
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
});


// Route::middleware('auth')->get('/plans', [SubscriptionController::class, 'showPlans'])->name('plans');
// Route::middleware('auth')->post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe.plan');


Route::middleware(['auth', 'subscribed'])->group(function () {
    Route::get('/premium-feature', [PremiumController::class, 'index']);
});
