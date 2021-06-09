<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_citoyen',
        'nom',
        'type',
        'quantity'
    ];
}
