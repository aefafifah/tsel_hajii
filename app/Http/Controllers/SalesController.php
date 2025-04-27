<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUsers;
use App\Models\Produk;
use App\Models\Merchandise;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:role_users,email',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pin' => 'required|digits_between:4,6',
            'role' => 'required|string',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('sales_photos', 'public');
        }

        RoleUsers::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $photoPath,
            'pin' => $request->pin,
            'role' => $request->role,
            'phone' => $request->phone,
        ]);
        return redirect()->route('add_sales')->with('success', 'Sales berhasil ditambahkan!');

    }

    // public function showChecklist()
    // {
    //     $sales = RoleUsers::where('role', operator: 'sales')->get();

    //     return view('supvis.sales_allow', compact('sales'));
    // }
    public function updateIsSetoran(Request $request, $id)
    {
        $salesperson = RoleUsers::findOrFail($id);

        if ($salesperson->role === 'sales') {
            $salesperson->is_setoran = $request->is_setoran;
            $salesperson->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid role']);
    }
    public function transaksiPage(Request $request)
    {
        $user = auth()->user();

        if ($user->role === 'sales' && !$user->is_setoran) {
            session()->flash('alert', 'Silahkan setoran dahulu ke supervisor.');
            return redirect()->route('sales.home');
        }
        $produks = Produk::all();
        $merchandises = Merchandise::all();
        $merchandises->each(function ($merchandise) {
            $merchandise->produk_ids = $merchandise->produks->pluck('id')->toArray();
        });
        return view('sales.transaksi', compact('produks', 'merchandises'));
    }

    public function index(Request $request)
    {
        $transaksi = Transaksi::withTrashed()
            ->with('produk')
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();

        $groupedTransaksi = $transaksi->groupBy(function ($item) {
            return Carbon::today()->format('Y-m-d');
        });

        $totalsPerDate = $groupedTransaksi->map(function ($items) {
            $totalPenjualan = $items->sum(function ($item) {
                return $item->produk ? $item->produk->produk_harga_akhir : 0;
            });
            $totalInsentif = $items->sum(function ($item) {
                return $item->produk ? $item->produk->produk_insentif : 0;
            });

            return [
                'totalPenjualan' => $totalPenjualan,
                'totalInsentif' => $totalInsentif,
            ];
        });

        $totalPenjualan = $totalsPerDate->sum('totalPenjualan');
        $totalInsentif = $totalsPerDate->sum('totalInsentif');

        return view('sales/home', compact('groupedTransaksi', 'totalsPerDate', 'totalPenjualan', 'totalInsentif'));
    }
    public function tampilsales()
    {
        $users = RoleUsers::where('role', 'sales')->get();
        return view('supvis.daftarsales', compact('users'));
    }

    public function edit($id)
    {
        $user = RoleUsers::findOrFail($id);
        return view('supvis.editsales', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bertugas' => 'required|boolean',
            'tempat_tugas' => 'nullable|string|max:255',
        ]);

        $user = RoleUsers::findOrFail($id);
        $user->update([
            'bertugas' => $request->bertugas,
            'tempat_tugas' => $request->tempat_tugas,
        ]);

        return redirect()->route('role-users.sales')->with('success', 'Data bertugas berhasil diperbarui!');
    }

    public function massUpdate(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'bertugas' => 'required|boolean',
            'tempat_tugas' => 'required|string|max:255',
        ]);

        RoleUsers::whereIn('id', $request->user_ids)
            ->update([
                'bertugas' => $request->bertugas,
                'tempat_tugas' => $request->tempat_tugas,
            ]);

        return redirect()->back()->with('success', 'Data bertugas berhasil diperbarui secara massal!');
    }
<<<<<<< HEAD
    
        
    public function toggleActivate(Request $request, $id)
    {
        $transaksi = Transaksi::withTrashed()->findOrFail($id);

        $transaksi->is_activated = $request->input('is_activated') ? true : false;
        $transaksi->save();
    
        return response()->json(['success' => true]);
    }
=======
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972




}

