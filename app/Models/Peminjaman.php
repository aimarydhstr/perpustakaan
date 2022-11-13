<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengembalian;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\User;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = ['id_anggota', 'id_buku', 'id_user', 'tgl_pinjam', 'tgl_kembali'];
    public $timestamps = false;

    public function pengembalian(){
        return $this->hasOne(Pengembalian::class, 'id_peminjaman');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
    
    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
