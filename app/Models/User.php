<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['nama', 'username', 'password', 'foto', 'id_role', 'isActive'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'id_user');
    }

    public function pengembalian(){
        return $this->hasMany(Pengembalian::class, 'id_user');
    }
    
    public function role(){
        return $this->belongsTo(Role::class, 'id_role');
    }
}