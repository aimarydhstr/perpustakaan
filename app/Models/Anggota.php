<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = ['nama', 'jenis_kelamin', 'email', 'alamat', 'foto', 'isActive'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'id_anggota');
    }
}
