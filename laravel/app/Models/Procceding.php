<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procceding extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'representado',
        'descripcion',
        'numExpediente',
        'numExpedienteJuzgado',
        'contrario'
    ];
}
