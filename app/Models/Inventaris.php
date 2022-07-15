<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = "inventaris";
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jumlah',
        'satuan',
        'kondisi',
        'id_kategori',
        'id_user'
    ];
    public function detailp(){
        return $this->hasMany('App\Models\DetailPinjam');
    }
    public function kategori(){
        return $this->belongsTo('App\Models\Kategori', 'id_kategori', 'id');
    }
    /*use \Znck\Eloquent\Traits\BelongsToThrough;
    public function notif(){
        return $this->hasManyThrough(Notification::class, DetailPinjam::class);
    }*/
    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    
}