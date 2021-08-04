<?php

namespace App\Models;

use App\Models\RapportArresation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function rapport_arrestations()
    {
        return $this->hasMany(RapportArresation::class, 'id_citoyen')->with(['agent', 'amende']);
    }
}


