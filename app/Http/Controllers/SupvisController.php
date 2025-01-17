<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUsers;
use Illuminate\Support\Facades\Validator;

class SupvisController extends Controller
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
        return redirect()->route('add_supvis')->with('success', 'Sales berhasil ditambahkan!');

    }
}

