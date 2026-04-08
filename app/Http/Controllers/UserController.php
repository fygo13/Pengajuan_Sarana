<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return back()->with('success', 'User berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user->role == 'admin') {
            return back()->with('error', 'Tidak bisa menghapus admin');
        }

        $user->delete();

        return back();
    }
}
