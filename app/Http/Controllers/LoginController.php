<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'pin' => 'required',
        ]);


        $user = RoleUsers::where('email', $request->email)->first();

        if ($user && Hash::check($request->pin, $user->pin)) {

            switch ($user->role) {
                case 'supervisor':
                    Auth::login($user);
                    return redirect()->route('supervisor.dashboard');
                case 'sales':
                    Auth::login($user);
                    return redirect()->route('sales');
                default:
                    return back()->withErrors(['role' => 'Role tidak valid untuk mengakses halaman ini.']);
            }
        }


        return back()->withErrors(['email' => 'Email atau PIN tidak valid.']);
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
