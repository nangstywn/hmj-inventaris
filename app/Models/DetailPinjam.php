<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    use HasFactory;
    protected $table = "detail_pinjam";
    protected $hidden = ["id_detail_pinjam"];
    protected $fillable = [
        "id_inventaris",
        "id_peminjaman",
        "jumlah",
    ];
    public function inventaris()
    {
        return $this->belongsTo('\App\Models\Inventaris','id_inventaris','id');
    }
    public function peminjaman()
    {
        return $this->belongsTo('\App\Models\Peminjaman', 'id_peminjaman', 'id');
    }
    public function notification()
    {
        return $this->hasOne('\App\Models\Notification');
    }
}