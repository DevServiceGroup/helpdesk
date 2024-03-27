<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimientos extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'email',
        'requerimiento',
        'importancia',
        'empresa'
    ];
}
