<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'usuarios';//me usas la tabla usuarios y no users cara papa
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario',
        'email',
        'password',
        'nombre',
        'apellido', 
        'direccion', 
        'telefono'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',

    ];

    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */

    protected function nombre() : Attribute
    {
        return new Attribute(
            set: function ($value){
                return strtolower($value);
            },

            get: function ($value)
            {
                return ucwords($value);
            }
        );
    }

    protected function password() : Attribute
    {
        return new Attribute(
            set: function ($value){
                return Hash::make($value);
            }
        );
    }

}