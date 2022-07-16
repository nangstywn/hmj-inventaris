<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    //public $timestamps = false;
    protected $guarded = [];
    //protected $fillable = [
    //    'nama_kategori'
    //];
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_kategori'
            ]
        ];
    }

    public function inventaris()
    {
        return $this->hasMany('App\Models\Inventaris');
    }
}