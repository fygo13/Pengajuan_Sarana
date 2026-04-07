<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if(session('role') !== 'admin') return redirect('/login');

        $data = User::all();
        return view('admin.user', compact('data'));
    }

    public function store(Request $request)
    {
        User::create([
            'username' => $request->username,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back();
    }

    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }
}
