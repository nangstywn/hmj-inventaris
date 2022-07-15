<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;

    //public function users(){
     //   return $this->belongsToMany("App\Models\User", 'role_users');
    //}
    public function users(){
    return $this->belongsToMany(User::class);
}
}