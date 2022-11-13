<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $primaryKey = 'id_penerbit';
    protected $fillable = ['nama'];
    public $timestamps = false;
    
    public function buku(){
        return $this->hasMany(Buku::class, 'id_penerbit');
    }
}
