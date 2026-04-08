<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function form()
    {
        return view('login');
    }

    public function login(Request $request)
    {   
        // cek username atau nis
        $user = User::where('username', $request->username)->orWhere('nis', $request->username)->first();

        if ($user && $user->password == $request->password) {
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
