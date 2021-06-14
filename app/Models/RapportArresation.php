<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportArresation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_arrestation',
        'heure_arrestation',
        'addresse_pdp',
        'date_rapport',
        'description',
        'id_police',
        'id_citoyen',
        'id_amende'
    ];
}
