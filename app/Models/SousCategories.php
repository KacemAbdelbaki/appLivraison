<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategories extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Nom de la table associée au modèle
    protected $table = 'sous_categories';

    // Les champs pouvant être remplis massivement
    protected $fillable = ['id', 'nom', 'id_categorie'];
}
