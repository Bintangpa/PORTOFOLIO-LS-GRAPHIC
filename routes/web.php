<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AccountController;



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
    
    // Contact Control Routes
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('/contact', [ContactController::class, 'update'])->name('contact.update');
    
    // Website Settings Routes
    Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
    Route::put('/website', [WebsiteController::class, 'update'])->name('website.update');
    
    // About Page Management Routes
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about', [AboutController::class, 'update'])->name('about.update');
    
    // Account Settings Routes
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::put('/account/profile', [AccountController::class, 'updateProfile'])->name('account.profile');
    Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
    
    // CSRF Token refresh route
    Route::get('/csrf-token', function() {
        return response()->json(['token' => csrf_token()]);
    })->name('csrf.token');
});

// Dashboard redirect
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.portfolios.index');
    }
    return redirect()->route('home');
})->middleware('auth')->name('dashboard');