<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Models\Materiel;
use Illuminate\Http\Request;

class etatController extends Controller
{
    public function index(){
        $etats = Etat::all();
        return view('pages.etat.index',compact('etats'));
    }
    public function modifier($id){
        $etats = Etat::findOrFail($id);
        return view('pages.etat.modifier',compact('etats'));
    }

    public function ajouterPage (){
        return view('pages.etat.ajoute');
    }

    public function ajouter(Request $request){
        $request->validate([
            "etat"=>"required|unique:etats,etats",
        ],[
            "etat.required"=>"ce champs est obligatoire",
        ]);
        Etat::insert([
            'etats'=>$request->etat,
        ]);
        return redirect()->route('etat.index');
    }

    public function edit(Request $request,$id){
        $request->validate([
            'etat'=>'required',
        ]);
         Etat::findOrFail($id)->update([
            'etats'=>$request->etat,
        ]);
        return redirect()->route('etat.index');
    }

    public function delete($id){
        Etat::findOrFail($id)->delete();
        return redirect()->route('etat.index');
    }

    public function filtre($id,$filtre){
        $materiels = Materiel::where("etats_id",$id)->get();

        return view('pages.etat.filtre',compact("materiels","filtre"));
    }
}
