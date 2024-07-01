<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Personnels;

class EquipeController
{
    public function store(Request $request)
    {
        $equipe = new Equipe();
        $equipe->id_personnel  = $request->id_personnel;
        $equipe->save();
        return redirect()->route('listeEquipes')->with('success', 'Formulaire soumis avec succès!');
    }

    public function getEquipes()
    {
        $equipes = Equipe::all();
        $personnelsIds = $equipes->pluck('id_personnel');
        $personnels = Personnels::whereIn('id', $personnelsIds)->get();
        return view('Administrateur/equipe/listeEquipes', ['data' => $personnels]);
    }

    public function getEquipeId($id)
    {
        $equipe = Equipe::find($id);
        return view('Administrateur/equipe/listeEquipes', ['data' => $equipe]);
    }

    public function deleteEquipe($id)
    {
        $equipe = Equipe::where('id_personnel', $id)->first();
        $equipe->delete();
        return redirect()->route('listeEquipes')->with('message', 'Equipe a ete bien supprimé');
    }

    // public function updateEquipe(Request $request, $id)
    // {
    //     $equipe = Equipe::find($id);
    //     $equipe->id_personnels  = $request->id_personnels;
    //     $equipe->update();
    //     return redirect()->route('listeEquipes')->with('message', 'Equipe a ete bien modifié');
    // }

    public function ajouterEquipe()
    {
        $personnels = Personnels::all();
        $equipes = Equipe::all()->pluck('id_personnel');
        $personnels = Personnels::whereNotIn('id', $equipes)->get();
        return view('Administrateur/equipe/ajouterEquipe', ['data' => $personnels]);
    }
}
