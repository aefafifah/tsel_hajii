<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\InsentifController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupvisController;

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

// tambah spv
Route::get('/tambah_spv', function () {
    return view('tambah_spv');
});


// kasaran landingpage
Route::get('/', function () {
    return view('login');
});

// login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


// -------------
// SUPERVISOR

// Grup rute untuk role supervisor
Route::middleware(['supervisor'])->group(function () {
    // Dashboard Supervisor
    Route::get('/supvis/home', function () {
        return view('supvis.home');
    })->name('supvis.home');

    // Rute Insentif
    Route::prefix('insentif')->name('insentif.')->group(function () {
        Route::get('/', [InsentifController::class, 'index'])->name('index');
        Route::get('/create', [InsentifController::class, 'create'])->name('create');
        Route::post('/store', [InsentifController::class, 'store'])->name('store');
        Route::get('/{insentif}/edit', [InsentifController::class, 'edit'])->name('edit');
        Route::put('/{insentif}', [InsentifController::class, 'update'])->name('update');
        Route::delete('/{insentif}', [InsentifController::class, 'destroy'])->name('destroy');
        Route::get('/{insentif}', [InsentifController::class, 'show'])->name('show');
    });

    // Rute Produk
    Route::prefix('produk')->name('produk.')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('index');
        Route::get('/create', [ProdukController::class, 'create'])->name('create');
        Route::post('/', [ProdukController::class, 'store'])->name('store');
        Route::get('/{produk}', [ProdukController::class, 'show'])->name('show');
        Route::get('/{produk}/edit', [ProdukController::class, 'edit'])->name('edit');
        Route::put('/{produk}', [ProdukController::class, 'update'])->name('update');
        Route::delete('/{produk}', [ProdukController::class, 'destroy'])->name('destroy');
    });

    // Rute Merchandise
    Route::prefix('merch')->name('merch.')->group(function () {
        Route::get('/', [MerchandiseController::class, 'index'])->name('index');
        Route::get('/create', [MerchandiseController::class, 'create'])->name('create');
        Route::post('/', [MerchandiseController::class, 'store'])->name('store');
        Route::get('/{merchandise}', [MerchandiseController::class, 'show'])->name('show');
        Route::get('/{merchandise}/edit', [MerchandiseController::class, 'edit'])->name('edit');
        Route::put('/{merchandise}', [MerchandiseController::class, 'update'])->name('update');
        Route::delete('/{merchandise}', [MerchandiseController::class, 'destroy'])->name('destroy');
    });

    // Tambah Sales Backend
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/tambah-sales', function () {
        return view('supvis.add_sales');
    })->name('add_sales');

    // Tambah Supervisor Backend
    Route::post('/supvis', [SupvisController::class, 'store'])->name('supvis.store');
    Route::get('/tambah-supvis', function () {
        return view('supvis.add_supvis');
    })->name('add_supvis');

    // Sales Checklist
    Route::get('/sales-checklist', [SalesController::class, 'showChecklist'])->name('sales.checklist');
});


// -------------

Route::middleware(['sales'])->group(function () {
    Route::get('/sales/dashboard', function () {
        return view('sales');
    })->name('sales');
});

// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


