<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_agent',
        'id_rapport_arrestation',
        'date_fait',
        'heure_fait',
        'description'
    ];

}
