<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AspirasiController extends Controller
{
    public function index()
    {
        if(!session('id')) return redirect('/login');

        $kategori = Kategori::all();
        return view('siswa.form', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'lokasi' => 'required',
        ]);

        Aspirasi::create([
            'user_id' => session('id'),
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'lokasi' => $request->lokasi,
            'tanggal' => now()
        ]);

        return redirect('/siswa/histori')->with('success', 'Aspirasi berhasil diajukan');
    }

    public function histori()
    {
        $data = Aspirasi::where('user_id', session('id'))->with('kategori', 'feedback')->get();

        return view('siswa.histori', compact('data'));
    }
}
