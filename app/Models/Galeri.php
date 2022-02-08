<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_foto';
    protected $fillable = [
         '', 'id_ktg', 'foto', 'tanggal', 'caption',
    ];

    public function katArt(){
    	return $this->belongsTo(Kategori_Artikel::class);
    }
}
