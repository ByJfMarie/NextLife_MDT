<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citoyen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'dateDeNaissance',
        'civilite',
        'type',
        'adresse',
        'telephone',
        'photo_path',
        'driveLicense',
        'weaponLicense',
        'isWanted',
        'isSummoned' 
    ];
}


