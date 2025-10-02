<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PortfolioController;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{portfolio}', [HomeController::class, 'show'])->name('portfolio.show');
Route::get('/pencarian', [HomeController::class, 'search'])->name('search');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [HomeController::class, 'sendMessage'])->name('contact.send');

// Auth Routes
Auth::routes();

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('portfolios', PortfolioController::class);
});

// Dashboard redirect
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.portfolios.index');
    }
    return redirect()->route('home');
})->middleware('auth')->name('dashboard');