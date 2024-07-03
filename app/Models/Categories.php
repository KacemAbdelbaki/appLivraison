<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Nom de la table associée au modèle
    protected $table = 'categories';

    // Les champs pouvant être remplis massivement
    protected $fillable = ['id', 'nom'];
}
