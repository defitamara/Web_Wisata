<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB,
App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('backend.artikel.index');
    }
    public function create()
    {
        $artikel = null;
        return view('backend.artikel.create',compact('artikel'));
    }
    public function store(Request $request)
    {
        // rename image name or file name 
        // $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
        // $request->gambar->move(public_path('data/data_artikel/'), $getimageName);

        // rename image name or file name 
        if ($request->hasFile('gambar')) {
            $getimageName = rand(11111, 99999) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $upload_success = $request->file('gambar')->move(public_path('data/data_artikel/'), $getimageName);
        }

        $data_simpan = [
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'gambar' => $getimageName,
            'isi' => $request->isi,
        ];

        Artikel::create($data_simpan);

        return redirect()->route('artikel.index')
        ->with('success','Artikel baru berhasil disimpan.');
        // ->with('image',$getimageName);
    }
}
