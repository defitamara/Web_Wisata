<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request,
App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $galeri1 = Galeri::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'galeri.id_ktg')
                   ->orderBy('id_foto','asc')
                   ->where('galeri.id_ktg','=','KAT01')
                   ->get();
        $galeri2 = Galeri::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'galeri.id_ktg')
                   ->orderBy('id_foto','asc')
                   ->where('galeri.id_ktg','=','KAT02')
                   ->get();
        $galeri5 = Galeri::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'galeri.id_ktg')
                   ->orderBy('id_foto','asc')
                   ->where('galeri.id_ktg','=','KAT05')
                   ->get();
        return view('frontend.home', compact('galeri1','galeri2','galeri5'));
    }
}
