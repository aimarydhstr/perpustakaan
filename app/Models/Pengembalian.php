<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use App\Models\User;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $fillable = ['id_peminjaman', 'id_user', 'tgl_kembali', 'denda'];
    public $timestamps = false;

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
