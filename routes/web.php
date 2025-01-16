<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\InsentifController;

// contoh layout
Route::get('/billy', function () {
    return view('billy');
});
// transaksi
Route::get('/transaksi', function () {
    return view('transaksi');
});
Route::get('/sales/home', function () {
    return view('sales.home');
});

Route::get('/sales/', function () {
    return view('sales.home');
});

Route::get('/admin/home', function () {
    return view('admin.home');
});

Route::get('/admin/', function () {
    return view('admin.home');
});

Route::get('/supvis/home', function () {
    return view('supvis.home');
});

Route::get('/supvis/', function () {
    return view('supvis.home');
});

// checklist sales
Route::get('/checklist', function () {
    return view('checklist_sales');
});

// tambah sales
Route::get('/tambah_sales', function () {
    return view('tambah_sales');
});

// produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');


// merch
Route::get('/merch', [MerchandiseController::class, 'index'])->name('merch.index');
Route::get('/merch/create', [MerchandiseController::class, 'create'])->name('merch.create');
Route::post('/merch', [MerchandiseController::class, 'store'])->name('merch.store');
Route::get('/merch/{merchandise}', [MerchandiseController::class, 'show'])->name('merch.show');
Route::get('/merch/{merchandise}/edit', [MerchandiseController::class, 'edit'])->name('merch.edit');
Route::put('/merch/{merchandise}', [MerchandiseController::class, 'update'])->name('merch.update');
Route::delete('/merch/{merchandise}', [MerchandiseController::class, 'destroy'])->name('merch.destroy');


// insentif
Route::get('/insentif', [InsentifController::class, 'index'])->name('insentif.index');
Route::get('/insentif/create', [InsentifController::class, 'create'])->name('insentif.create');
Route::post('/insentif/store', [InsentifController::class, 'store'])->name('insentif.store');
Route::get('/insentif/{insentif}/edit', [InsentifController::class, 'edit'])->name('insentif.edit');
Route::put('/insentif/{insentif}', [InsentifController::class, 'update'])->name('insentif.update');
Route::delete('/insentif/{insentif}', [InsentifController::class, 'destroy'])->name('insentif.destroy');
Route::get('/insentif/{insentif}', [InsentifController::class, 'show'])->name('insentif.show');

// kasaran landingpage
Route::get('/', function () {
    return view('dashboard');
});
// login
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
