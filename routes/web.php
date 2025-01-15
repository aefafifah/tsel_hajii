<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
Route::get('/', function () {
    return view('welcome');
});
// Show the login form
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login request
Route::post('login', [LoginController::class, 'login']);

Route::get('/supervisor/dashboard', function () {
    if (Auth::user() && Auth::user()->role === 'supervisor') {
        return view('supervisor');
    }
    abort(403, 'Unauthorized access.');
})->name('supervisor.dashboard');

// Sales route
Route::get('/sales/dashboard', function () {
    if (Auth::user() && Auth::user()->role === 'sales') {
        return view('sales.dashboard');
    }
    abort(403, 'Unauthorized access.');
})->name('sales');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
