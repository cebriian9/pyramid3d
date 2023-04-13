<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';//me usas la tabla usuarios y no users cara papa
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'material',
        'relleno',
        'calidad',
        'tamano', 
        'nombreArchivo', 
        'pathArchivo'
    ];


    

}
