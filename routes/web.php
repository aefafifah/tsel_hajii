<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\InsentifController;


Route::get('/billy', function () {
    return view('billy');
});






Route::get('/', function () {
    return view('welcome');
});
// Show the login form
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
// supervisor
Route::get('/supervisor/dashboard', function () {
    if (Auth::user() && Auth::user()->role === 'supervisor') {
        return view('supervisor');
    }
    abort(403, 'Unauthorized access.');
})->name('supervisor.dashboard');
// sales
Route::get('/sales/dashboard', function () {
    if (Auth::user() && Auth::user()->role === 'sales') {
        return view('sales');
    }
    abort(403, 'Unauthorized access.');
})->name('sales');
// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
