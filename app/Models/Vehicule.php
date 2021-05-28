<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele',
        'immatriculation',
        'type',
        'proprietaire',
        'description',
        'photo_path',
        'isWanted'
    ];
}
