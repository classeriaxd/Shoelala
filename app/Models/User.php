<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password',  
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'address',
        'contact_number',
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
    protected $primaryKey = 'user_id';

    public function completes()
    {
        return $this->hasMany(Order::class, 'completed_by');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
