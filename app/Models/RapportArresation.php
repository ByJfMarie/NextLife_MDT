<?php

namespace App\Models;

use App\Models\Citoyen;
use App\Models\HistoriqueAmendes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function agent()
    {
        return $this->belongsTo('App\Models\User', 'id_police');
    }

    public function citoyen()
    {
        return $this->belongsTo(Citoyen::class, 'id_citoyen');
    }

    public function amende()
    {
        return $this->belongsTo(HistoriqueAmendes::class, 'id_amende');
    }
}
