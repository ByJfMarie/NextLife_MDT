<?php

namespace App\Models;

use App\Models\RapportArresation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoriqueAmendes extends Model
{
    use HasFactory;

    protected $fillable = [
        'citoyen',
        'descriptif',
        'prix'
    ];

    public function rapport_arrestations()
    {
        return $this->hasOne(RapportArresation::class);
    }
}
