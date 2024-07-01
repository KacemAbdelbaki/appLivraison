<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
        //
        public function store(Request $request)
        {
            // Création d'un nouvel livreur avec les données validées
            $categorie = new Categorie();
 
            if ($request->hasFile('image')) {
     $image = $request->file('image');
     $imageName = $image->getClientOriginalName();
     $image->move(public_path('images/categorie'), $imageName);
            }
     $categorie->desgnation_categorie  = $request->designation;
     $categorie->photo_categorie  = $imageName ; 
            $categorie->save();
            return redirect()->route('listeCategorie')->with('success', 'Formulaire soumis avec succès!');
        }
    
    
        public function getCategorie(){
            $categorie = Categorie::all();
            return view('Administrateur/listeCategorie',['data'=>$categorie]);
        }
    
    
        public function deleteCategorie($id){
            $categorie = Categorie::find($id);
            $categorie->delete();
             return redirect()->route('listeCategorie')->with('message', 'Projet a ete bien supprimé');
        }
    
        public function updateCategorie(Request $request){
            $categorie = Categorie::find($request->id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images/categorie'), $imageName);
                       }
                $categorie->desgnation_categorie  = $request->designation;
                $categorie->photo_categorie  = $imageName ; 
                       $categorie->save();
            return redirect()->route('listeCategorie')->with('message', 'Projet a ete bien modifié');
        }
    
        public function index(Request $request)
        {
            return redirect()->route('listeCategorie')->with('success', 'Formulaire soumis avec succès!');
        }
    
        public function indexCategorie(Request $request)
        {
            return redirect()->route('listeCategorie');
        }
    
        public function getCategorieId($id){
            $categorie = Categorie::find($id);
            return view('Administrateur/modifierCategorie', ['data'=>$categorie]);
        }
 }
 