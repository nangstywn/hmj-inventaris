<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'level',
        'email',
        'password',
        'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //public function hasRole($role) {
    //return $this->roles()->where('name', $role)->count() == 1;
    //}
    /**
     * @param string|array $roles
     */
    /**
     * Check multiple roles
     * @param array $roles
     */
    /**
     * Check one role
     * @param string $role
     */
    public function peminjaman()
    {
        // disini kita katakan bahwa setiap user akan memiliki banyak post
        // keterangan: itu PostModel sesuaikan dengan nama MODEL POST yang agan gunakan
        return $this->hasMany('App\Models\Peminjaman');
    }
    public function notification()
    {
        return $this->hasMany('App\Models\Notification');
    }
    public function inventaris()
    {
        return $this->hasMany('App\Models\Inventaris');
    }
}
