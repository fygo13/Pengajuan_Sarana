<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if(session('role') !== 'admin') return redirect('/login');

        $query = Aspirasi::with('user', 'kategori', 'feedback');

        if($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }
        

        $data = $query->get();
        $kategori = Kategori::all();

        return view('admin.dashboard', compact('data', 'kategori'));
    }

    public function destroy($id)
    {
        Aspirasi::destroy($id);
        return back()->with('success', 'Aspirasi berhasil dihapus');
    }

}
