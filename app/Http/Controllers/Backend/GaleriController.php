<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\KategoriArtikel;
use Illuminate\Support\Carbon; 
use File; 

class GaleriController extends Controller
{
    public function index(){
        $galeri = Galeri::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'galeri.id_ktg')
                   ->orderBy('id_foto','asc')
                   ->get();
        return view('backend.galeri.index', compact('galeri'));
    }

    public function create()
    {
        $kategori = KategoriArtikel::all();
        return view('backend.galeri.create',compact('kategori'));
    }
    public function store(Request $request)
    {

        // mengambil file gambar dan mengubah namanya 
        if ($request->hasFile('foto')) {
            $getimageName = rand(11111, 99999) . '.' . $request->file('foto')->getClientOriginalExtension();
        }

        $data_simpan = [
            'id_ktg' => $request->id_ktg,
            'foto' => $getimageName,
            'tanggal' => $request->tanggal,
            'caption' => $request->caption,
        ];

        Galeri::create($data_simpan);
        $upload_success = $request->file('foto')->move(public_path('data/data_galeri/'), $getimageName);

        return redirect()->route('galeri.index')
        ->with('success','Foto baru berhasil disimpan.')
        ->with('image',$getimageName);
    }

    public function edit($id)
    {
        $galeri = Galeri::where('id_foto',$id)->first();
        $kategori = KategoriArtikel::all();
        return view('backend.galeri.edit',compact('galeri','kategori'));
    }

    public function update(Request $request, $id)
    {
        $gbr=$request->nama_foto;
        
        if($request->has('foto')) {
            $getimageName = rand(11111, 99999) . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->foto->move(public_path('data/data_galeri'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'id_ktg' => $request->id_ktg,
            'foto' => $getimageName,
            'caption' => $request->caption,
        ];

        Galeri::where('id_foto', $id)->update($data_simpan);

        return redirect()->route('galeri.index')
                        ->with('success','Data galeri telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mengakses gambar di file dan menghapusnya
        $galeri = Galeri::where('id_foto',$id)->first();
        File::delete('/data/data_galeri/'.$galeri->foto);

        // Menghapus data dari database
        Galeri::where('id_foto',$id)->delete();

        return redirect()->route('galeri.index')
                        ->with('success','Data foto telah berhasil dihapus');
    }
}
