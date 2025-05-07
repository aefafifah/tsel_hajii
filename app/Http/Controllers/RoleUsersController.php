<?php

namespace App\Http\Controllers;

use App\Models\RoleUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RoleUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(RoleUsers $roleUsers)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roleUsers = RoleUsers::findOrFail($id);
        return view('role_users.edit', compact('roleUsers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:role_users,email,' . $id,
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'pin' => 'nullable|digits_between:4,6',
        'role' => 'nullable|string',
        'phone'=> 'nullable|numeric',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $roleUser  = RoleUsers::findOrFail($id);
    $dataToUpdate = [];


    if ($request->has('name')) {
        $dataToUpdate['name'] = $request->name;
    }

    if ($request->has('email')) {
        $dataToUpdate['email'] = $request->email;
    }

    if ($request->hasFile('photo')) {

        if ($roleUser ->photo) {
            Storage::disk('public')->delete($roleUser ->photo);
        }

        $dataToUpdate['photo'] = $request->file('photo')->store('profile_photos', 'public');
    }

    if ($request->filled('pin')) {
        $dataToUpdate['pin'] = $request->pin;
    }

    if ($request->has('role')) {
        $dataToUpdate['role'] = $request->role;
    }

    if ($request->has('phone')) {
        $dataToUpdate['phone'] = $request->phone;
    }

    
    $roleUser ->update($dataToUpdate);


    $redirectRoutes = [
        'supervisor' => 'supvis.home',
        'sales' => 'sales.home',
        'kasir' => 'kasir.home'
    ];

    if (!array_key_exists($roleUser ->role, $redirectRoutes)) {
        return back()->withErrors(['role' => 'Role tidak valid untuk mengakses halaman ini.']);
    }

    return redirect()->route($redirectRoutes[$roleUser ->role])
        ->with('success', 'Profil berhasil diperbarui.');
}

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleUsers $roleUsers)
    {

    }
}
