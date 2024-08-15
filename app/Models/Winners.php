<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winners extends Model
{
    protected $fillable =[
        'nombre',
        'cedula',
        'telefono',
        'correo',
        
    ]
    
        use HasFactory;
}
