<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUsers;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:role_users,email',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'pin' => 'required|digits_between:4,6',
            'role' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $photoPath = $request->file('photo')->store('sales_photos', 'public');


        RoleUsers::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $photoPath,
            'pin' => $request->pin,
            'role' => $request->role,
        ]);
        return redirect()->route('add_sales')->with('success', 'Sales berhasil ditambahkan!');

    }

    public function showChecklist()
    {
        $sales = RoleUsers::where('role', operator: 'sales')->get();

        return view('supvis.sales_allow', compact('sales'));
    }

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

    return view('sales.transaksii');
}




}

