<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Category;
use App\Models\Division;
use App\Models\Etat;
use App\Models\Marque;
use App\Models\Materiel;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class affectationController extends Controller
{
    public function index(){
        $affectations = Affectation::all();
        return view('pages.affectation.index',compact('affectations'));
    }

    // la page d'ajouter
    public function ajouterPage(){
        $materiels = Materiel::all();
        $etats = Etat::all();
        $divisions = Division::all();
        $services = Service::all();
        $users = User::all();
        $categories = Category::all();
        return view('pages.affectation.ajoutePage',compact('etats',"divisions",'services',"users","categories","materiels"));
    }
    // la function post d'ajoutation
    public function ajouter(Request $request){
        $request->validate([
            'services_tag' => 'required',
            'code_barre' => 'required',
            'division' => 'required',
            'service' => 'required',
            'materiel' => 'required',
            'user' => 'required',
        ], [
            'required' => 'Le champ :attribute est requis.',
        ]);

        $materiel = Materiel::findOrFail($request->materiel);

        if ($materiel->quant > 0) {

            Affectation::insert([
                "division_id"=>$request->division,
                "service_id"=>$request->service,
                "user_id"=>$request->user,
                "materiel_id"=>$request->materiel,
                "services_tag"=>$request->services_tag,
                "code_barre"=>$request->code_barre,
            ]);

            $materiel->update([
                'quant' => $materiel->quant - 1
            ]);

        } else {
            return redirect()->route('affectation.ajouterPage')->with([
                'err' => 'Repture de stock'
            ]);

        }

        return redirect()->route('affectation.index')->with(["suc"=>"ajouter avec succes"]);
    }
    //la page de modification
    public function modifierPage($id){
        $affectation = Affectation::findOrFail($id);
        $materiels = Materiel::all();
        $etats = Etat::all();
        $divisions = Division::all();
        $services = Service::all();
        $users = User::all();
        $categories = Category::all();
        return view('pages.affectation.modifierPage',compact("affectation","divisions",'services',"users","categories","materiels"));
    }
    public function modifier(Request $request,$id){

        $request->validate([
            'services_tag' => 'required',
            'code_barre' => 'required',
            'division' => 'required',
            'service' => 'required',
            'materiel' => 'required',
            'user' => 'required',
        ], [
            'required' => 'Le champ :attribute est requis.',
        ]);

        Affectation::findOrFail($id)->update([
            "division_id"=>$request->division,
            "service_id"=>$request->service,
            "user_id"=>$request->user,
            "materiel_id"=>$request->materiel,
            "services_tag"=>$request->services_tag,
            "code_barre"=>$request->code_barre,
        ]);
        return redirect()->route('affectation.index')->with(['mod'=>"modifier avec succes"]);

    }

    //la function de supprimer
    public function delete($id){
         Affectation::findOrFail($id)->delete();
         return redirect()->route('affectation.index')->with(["sup"=>"supprimer avec succes"]);
    }
}
