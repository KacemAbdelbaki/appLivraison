<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousCategories;
use App\Models\Categories;

class SousCategoriesController
{
    public function store(Request $request)
    {
        $sousCategorie = new SousCategories();
        $sousCategorie->nom = $request->nom; 
        $sousCategorie->id_categorie = $request->id_categorie; 
        $sousCategorie->save();
        return redirect()->route('listeSousCategories')->with('success', 'Formulaire soumis avec succès!');
    }

    public function getSousCategories()
    {
        $sousCategories = SousCategories::all();
        $finalSousCategories = collect([]);
        foreach ($sousCategories as $sc) {
            $finalSousCategories->push(['id' => $sc->id, 'nom' => $sc->nom, 'categorie' => Categories::find($sc->id_categorie)->nom]);
        }
        return view('Administrateur/sousCategorie/listeSousCategories', ['data' => $finalSousCategories]);
    }

    public function getSousCategorieId($id)
    {
        $sousCategorie = SousCategories::find($id);
        return view('Administrateur/sousCategorie/modifierSousCategorie', ['data' => $sousCategorie, "categories" => Categories::all()]);
    }

    public function deleteSousCategorie($id)
    {
        $sousCategorie = SousCategories::find($id);
        $sousCategorie->delete();
        return redirect()->route('listeSousCategories')->with('message', 'SousCategorie a ete bien supprimé');
    }

    public function updateSousCategorie(Request $request)
    {
        $sousCategorie = SousCategories::find($request->id);
        $sousCategorie->nom = $request->nom;
        $sousCategorie->id_categorie = $request->id_categorie; 
        $sousCategorie->update();
        return redirect()->route('listeSousCategories')->with('message', 'SousCategorie a ete bien modifié');
    }

    public function ajouterSousCategorie()
    {
        $Categories = Categories::all();
        return view('Administrateur/sousCategorie/ajouterSousCategorie', ['categories' => $Categories]);
    }
}
