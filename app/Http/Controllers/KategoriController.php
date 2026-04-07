<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function index()
    {
        if(session('role') !== 'admin') return redirect('/login');
        
        $data = Kategori::all();
        return view('admin.kategori', compact('data'));
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return back();
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return back();
    }
}
