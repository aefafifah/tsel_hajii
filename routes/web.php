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
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BudgetInsentifController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleUsersController;





// landing page
Route::get('/', function () {
    return view('login');
});

// login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// -------------
// SUPERVISOR

// Grup rute untuk role supervisor
Route::middleware(['supervisor'])->group(function () {
    // Dashboard Supervisor
    Route::get('/supvis/home', [HomeController::class, 'index'])->name('supvis.home');
     // Riwayat Transaksi
     Route::get('/supvis/riwayat-transaksi', [TransaksiController::class, 'index'])
     ->name('supvis.transactions.index');


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
        Route::post('/{id}/restore', [ProdukController::class, 'restore'])->name('restore');
        Route::delete('/{id}/force-delete', [ProdukController::class, 'forceDelete'])->name('force-delete');
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
    Route::post('/update-is-setoran/{id}',[SalesController::class,'updateIsSetoran'])-> name ('is_setoran');

    Route::prefix('supvis')->name('supvis.')->group(function () {
        // Budget Insentif
        Route::get('/budget-insentif', [BudgetInsentifController::class, 'index'])->name('budget_insentif.index');
        Route::post('/budget-insentif/update', [BudgetInsentifController::class, 'update'])->name('budget_insentif.update');
    });

    Route::get('supvis/void', [TransaksiController::class, 'supvisvoid'])->name('supvis.void');
    Route::delete('/supvis/void/{id}', [TransaksiController::class, 'supvisdestroy'])->name('supvis.void.supvisdestroy');


});
// ALL IN
Route::middleware(['auth'])->group(function () {
    Route::get('role_users/{roleUsers}/edit', [RoleUsersController::class, 'edit'])->name('role_users.edit');
    Route::put('role_users/{roleUsers}', [RoleUsersController::class, 'update'])->name('role_users.update');
});


// -------------
// SALES
Route::middleware(['sales'])->group(function () {
    Route::get('/sales/home', function () {
        return view('sales.home');
    })->name('sales.home');
    Route::get('/sales/transaksi', [SalesController::class, 'transaksiPage'])->name('sales.transaksi');
    Route::post('sales/transaksi/submit', [TransaksiController::class, 'submit'])->name('sales/transaksi/submit');
    Route::post('/transaksi/{id}/toggle-void', [TransaksiController::class, 'toggleVoid']);
    Route::get('/sales/transaksi/kwitansi', [TransaksiController::class, 'kwitansi'])->name('sales.transaksi.kwitansi');
    Route::get('/sales/kwitansi', function () {
        return view('sales.kwitansi');
    })->name('sales.kwitansi');

    Route::get('sales/rekap', [TransaksiController::class, 'dashboard'])->name('sales/rekap');
    });




// --------------------------------------------
// mainan

// checklist sales
Route::get('/checklist', function () {
    return view('checklist_sales');
});

// checklist sales
Route::get('/rekap', function () {
    return view('rekap_penjualan');
});

// tambah sales
Route::get('/tambah_sales', function () {
    return view('tambah_sales');
});

// tambah spv
Route::get('/tambah_spv', function () {
    return view('tambah_spv');
});


