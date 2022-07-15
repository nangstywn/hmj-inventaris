<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    //public $timestamps = false;
    protected $guarded = [];
    protected $fillable = [
        'tgl_pinjam',
        'tgl_kembali',
        'batas_kembali',
        'status_pinjam',
        'created_at',
        'updated_at',
        'id_inventaris',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    public function detailPinjam()
    {
        return $this->hasMany('\App\Models\DetailPinjam', 'id_peminjaman', 'id');
    }
    
}