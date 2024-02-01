<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\comicsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\transactionsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\reviewsController;

Route::get('/', function () {
    return view('front.welcome');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(comicsController::class)->prefix('comics')->group(function () {
        Route::get('', 'index')->name('comics');
        Route::get('create', 'create')->name('comics.create');
        Route::post('store', 'store')->name('comics.store');
        Route::get('show/{id}', 'show')->name('comics.show');
        Route::get('edit/{id}', 'edit')->name('comics.edit');
        Route::put('edit/{id}', 'update')->name('comics.update');
        Route::DELETE('destroy/{id}', 'destroy')->name('comics.destroy');
    });

    Route::controller(usersController::class)->prefix('admin')->group(function () {
        Route::get('', 'index')->name('admin');
        Route::get('create', 'create')->name('admin.create');
        Route::post('store', 'store')->name('admin.store');
        Route::get('show/{id}', 'show')->name('admin.show');
        Route::get('edit/{id}', 'edit')->name('admin.edit');
        Route::put('edit/{id}', 'update')->name('admin.update');
        Route::delete('destroy/{id}', 'destroy')->name('admin.destroy');
    });

    Route::controller(transactionsController::class)->prefix('transactions')->group(function () {
        Route::get('', 'index')->name('transactions');
        Route::get('create', 'create')->name('transactions.create');
        Route::post('store', 'store')->name('transactions.store');
        Route::get('show/{id}', 'show')->name('transactions.show');
        Route::get('edit/{id}', 'edit')->name('transactions.edit');
        Route::put('edit/{id}', 'update')->name('transactions.update');
        Route::delete('destroy/{id}', 'destroy')->name('transactions.destroy');
    });

    Route::controller(categoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('categories');
        Route::get('create', 'create')->name('categories.create');
        Route::post('store', 'store')->name('categories.store');
        Route::get('show/{id}', 'show')->name('categories.show');
        Route::get('edit/{id}', 'edit')->name('categories.edit');
        Route::put('edit/{id}', 'update')->name('categories.update');
        Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');
    });
    Route::controller(reviewsController::class)->prefix('reviews')->group(function () {
        Route::get('', 'index')->name('reviews');
        Route::get('create', 'create')->name('reviews.create');
        Route::post('store', 'store')->name('reviews.store');
        Route::get('show/{id}', 'show')->name('reviews.show');
        Route::get('edit/{id}', 'edit')->name('reviews.edit');
        Route::put('edit/{id}', 'update')->name('reviews.update');
        Route::delete('destroy/{id}', 'destroy')->name('reviews.destroy');
    });

    Route::get('/dashboard', [dashboardController::class, 'showDashboard'])->name('dashboard');
    Route::post('/comics', [comicsController::class, 'store']);
    Route::post('/admin', [usersController::class, 'store']);
    Route::post('/comics', [comicsController::class, 'store']);
    Route::post('/comics', [reviewsController::class, 'store']);

    

    // Route::get('/dashboard', function () {
    //     return view('dashboard', [
    //         'cards' => view('layouts.cards')->render(),
    //         'comics' => view('layouts.updates.comics')->render(),
    //         'customers' => view('layouts.updates.customers')->render(),
    //     ]);
    // });


    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
   

});
