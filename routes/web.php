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
use App\Http\Controllers\StockHistoryController;
use App\Http\Controllers\ExportRiwayatTransaksiController;





// Root landing page redirect
Route::get('/', function () {
    return redirect('/programhaji/login');
});

// Programhaji landing page redirect
Route::get('/programhaji/', function () {
    return redirect('/programhaji/login');
});

// login
Route::get('/programhaji/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/programhaji/login', [LoginController::class, 'login']);
// logout
Route::post('/programhaji/logout', [LoginController::class, 'logout'])->name('logout');


// -------------
// SUPERVISOR

// Grup rute untuk role supervisor
Route::middleware(['supervisor'])->group(function () {
    // Dashboard Supervisor
    Route::get('/programhaji/supvis/home', [HomeController::class, 'index'])->name('supvis.home');
    // Riwayat Transaksi
    Route::get('/programhaji/supvis/riwayat-transaksi', [TransaksiController::class, 'index'])
        ->name('supvis.transactions.index');
    // Export Excel Riwayat Transaksi
    Route::get('/programhaji/supvis/export-excel', [ExportRiwayatTransaksiController::class, 'exportExcel'])
        ->name('export.excel');

    // Rute Insentif
    Route::prefix('/programhaji/insentif')->name('insentif.')->group(function () {
        Route::get('/', [InsentifController::class, 'index'])->name('index');
        Route::get('/create', [InsentifController::class, 'create'])->name('create');
        Route::post('/store', [InsentifController::class, 'store'])->name('store');
        Route::get('/{insentif}/edit', [InsentifController::class, 'edit'])->name('edit');
        Route::put('/{insentif}', [InsentifController::class, 'update'])->name('update');
        Route::delete('/{insentif}', [InsentifController::class, 'destroy'])->name('destroy');
        Route::get('/{insentif}', [InsentifController::class, 'show'])->name('show');
    });

    // Rute Produk
    Route::prefix('/programhaji/produk')->name('produk.')->group(function () {
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
    Route::prefix('/programhaji/merch')->name('merch.')->group(function () {
        Route::get('/', [MerchandiseController::class, 'index'])->name('index');
        Route::get('/create', [MerchandiseController::class, 'create'])->name('create');
        Route::post('/', [MerchandiseController::class, 'store'])->name('store');
        Route::get('/{merchandise}', [MerchandiseController::class, 'show'])->name('show');
        Route::get('/{merchandise}/edit', [MerchandiseController::class, 'edit'])->name('edit');
        Route::put('/{merchandise}', [MerchandiseController::class, 'update'])->name('update');
        Route::delete('/{merchandise}', [MerchandiseController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/restore', [MerchandiseController::class, 'restore'])->name('restore');
        Route::delete('/{id}/force-delete', [MerchandiseController::class, 'forceDelete'])->name('force-delete');
    });

    // Tambah Sales Backend
    Route::post('/programhaji/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/programhaji/tambah-sales', function () {
        return view('supvis.add_sales');
    })->name('add_sales');

    // Tambah Supervisor Backend
    Route::post('/programhaji/supvis', [SupvisController::class, 'store'])->name('supvis.store');
    Route::get('/programhaji/tambah-supvis', function () {
        return view('supvis.add_supvis');
    })->name('add_supvis');

    // Sales Checklist



    Route::prefix('/programhaji/supvis')->name('supvis.')->group(function () {
        // Budget Insentif
        Route::get('/budget-insentif', [BudgetInsentifController::class, 'index'])->name('budget_insentif.index');
        Route::post('/budget-insentif/update', [BudgetInsentifController::class, 'update'])->name('budget_insentif.update');
        Route::get('/budget-insentif/pantau', [BudgetInsentifController::class, 'pantau'])->name('supvis.budget_insentif.pantau');
    });

    Route::get('/programhaji/supvis/void', [TransaksiController::class, 'supvisvoid'])->name('supvis.void');
    Route::delete('/programhaji/supvis/void/{id}', [TransaksiController::class, 'supvisdestroy'])->name('supvis.void.supvisdestroy');
});


// ALL IN
Route::middleware(['auth'])->group(function () {
    Route::get('/programhaji/role_users/{roleUsers}/edit', [RoleUsersController::class, 'edit'])->name('role_users.edit');
    Route::put('/programhaji/role_users/{roleUsers}', [RoleUsersController::class, 'update'])->name('role_users.update');
    Route::get('/programhaji/pantau-stok', [StockHistoryController::class, 'index'])->name('pantau.stok');
});


// -------------
// SALES
Route::middleware(['sales'])->group(function () {
    Route::get('/programhaji/sales/home', [SalesController::class, 'index'])->name('sales.home');
    Route::get('/programhaji/sales/transaksi', [SalesController::class, 'transaksiPage'])->name('sales.transaksi');
    Route::post('/programhaji/sales/transaksi/submit', [TransaksiController::class, 'submit'])->name('sales/transaksi/submit');
    Route::post('/programhaji/transaksi/{id}/toggle-void', [TransaksiController::class, 'toggleVoid']);
    Route::get('/programhaji/sales/transaksi/kwitansi', [TransaksiController::class, 'kwitansi'])->name('sales.transaksi.kwitansi');
    Route::get('/programhaji/sales/kwitansi', function () {
        return view('sales.kwitansi');
    })->name('sales.kwitansi');

    Route::get('/programhaji/sales/rekap', [TransaksiController::class, 'dashboard'])->name('sales/rekap');
});

// checklist sales
Route::post('/programhaji/update-setoran-sales', [SupvisController::class, 'updateSetoranSales'])->name('update.setoran.sales');
Route::post('/programhaji/update-setoran-status', [SupvisController::class, 'updateSetoranStatus'])->name('update.setoran.status');
Route::post('/programhaji/supvis/update-is-setoran/{id}', [SupvisController::class, 'updateIsSetoran']);
Route::post('/programhaji/supvis/setoran', [SupvisController::class, 'setoran']);
Route::post('/programhaji/supvis/update-setoran', [SupvisController::class, 'updateSetoran'])->name('supvis.update-setoran');
Route::get('/programhaji/history-setoran', [SupvisController::class, 'showHistorySetoran'])->name('history-setoran');
Route::get('/programhaji/history-setoran/data', [SupvisController::class, 'getHistorySetoranData'])->name('history.setoran.data');
Route::post('/programhaji/update-setoran-status', [SupvisController::class, 'updateSetoranStatus'])->name('update.history.setoran.status');

// --------------------------------------------


// under this untuk mainan

Route::get('/cek-imagick', function () {
    if (extension_loaded('imagick')) {
        return 'Imagick aktif!';
    } else {
        return 'Imagick TIDAK aktif!';
    }
});
// Approve superuser
Route::get('programhaji/supvis/approvetransaksi', [TransaksiController::class, 'approveTransaksi'])->name('transaksi.approve');
    Route::get('programhaji/supvis/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('programhaji/supvis/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');

// bayar
Route::get('programhaji/supvis/transaksi/{id}/bayar', [TransaksiController::class, 'editBayar'])->name('transaksi.edit.bayar');
Route::put('programhaji/supvis/transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
// kwitansi
Route::get('/programhaji/supvis/transaksi/kwitansi', [TransaksiController::class, 'kwitansi'])->name('supvis.transaksi.kwitansi');
// pdf print by billy
Route::get('/programhaji/supvis/transaksi/kwitansi/print/{id}', [TransaksiController::class, 'print'])->name('supvis.transaksi.kwitansi.print');
// whatsapp by billy
Route::get('/programhaji/supvis/transaksi/kwitansi/whatsapp/{id}', [TransaksiController::class, 'whatsapp'])->name('supvis.transaksi.kwitansi.whatsapp');
// un-lunas transaksi by billy
Route::put('/programhaji/supvis/transaksi/kwitansi/unlunas/{id}', [TransaksiController::class, 'unlunas'])->name('supvis.transaksi.kwitansi.unlunas');
// daftar sales by aef
Route::get('programhaji/supvis/role-users/sales', [SalesController::class, 'tampilsales'])->name('role-users.sales');
Route::get('/role-users/{id}/edit', [SalesController::class, 'edit'])->name('role-users.edit');
Route::put('/role-users/{id}', [SalesController::class, 'update'])->name('role-users.update');
Route::post('/role-users/mass-update', [SalesController::class, 'massUpdate'])->name('role-users.mass-update');
// refresh by billy
Route::get('/programhaji/supvis/approvetransaksi/refresh',[TransaksiController::class, 'refresh'])->name('transaksi.approve.refresh');



