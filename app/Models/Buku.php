<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = ['judul', 'id_kategori', 'id_penulis', 'id_penerbit', 'isbn', 'tahun_terbit', 'stok', 'foto'];
    public $timestamps = false;

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    
    public function penulis(){
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }
    
    public function penerbit(){
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }
}
