<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController
{
    public function store(Request $request)
    {
        $categorie = new Categories();
        $categorie->nom = $request->nom; 
        $categorie->save();
        return redirect()->route('listeCategories')->with('success', 'Formulaire soumis avec succès!');
    }

    public function getCategories()
    {
        $categories = Categories::all();
        return view('Administrateur/categorie/listeCategories', ['data' => $categories]);
    }

    public function getCategorieId($id)
    {
        $categorie = Categories::find($id);
        return view('Administrateur/categorie/modifierCategorie', ['data' => $categorie]);
    }

    public function deleteCategorie($id)
    {
        $categorie = Categories::find($id);
        $categorie->delete();
        return redirect()->route('listeCategories')->with('message', 'Categorie a ete bien supprimé');
    }

    public function updateCategorie(Request $request)
    {
        $categorie = Categories::find($request->id);
        $categorie->nom = $request->nom;
        $categorie->update();
        return redirect()->route('listeCategories')->with('message', 'Categorie a ete bien modifié');
    }

    // public function ajouterCategorie()
    // {
    //     $personnels = Categories::all();
    //     $categories = Categories::all()->pluck('id_personnel');
    //     $personnels = Categories::whereNotIn('id', $categories)->get();
    //     return view('Administrateur/categorie/ajouterCategorie', ['data' => $personnels]);
    // }
}
