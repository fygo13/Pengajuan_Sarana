<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function form()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //$request->validate([
            //'username' => 'required',
            //'password' => 'required',
        //]);

        // cek username atau nis
        $user = User::where('username', $request->username)->orWhere('nis', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['id' => $user->id, 'role' => $user->role]);

            return ($user->role=='admin') ? redirect('/admin/dashboard') : redirect('/siswa/form');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
