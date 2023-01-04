<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

  
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }

     

    protected $attributes = [
        'role_id' =>  2,
        // 'remember_token' => ,
    ];

    protected $fillable = [
        'username',
        'password',
        'NoHp',
        'alamat',
        'remember_token',
        'role_id',
    ];

  
    
    protected $hidden = [
        'password', 
        'remember_token',
    ];


    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
