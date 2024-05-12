<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Service;
use Illuminate\Http\Request;

class divisionController extends Controller
{
    public function index(){
        $divisions = Division::all();
        return view('pages.divisions.index',compact('divisions'));
    }

    //ajouter une division
    public function ajouter(){
        return view('pages.divisions.ajouter');
    }
    public function add(Request $request){
        $request->validate([
            "division"=>'unique:divisions,name|required',
        ],[
            "division.required"=>"le champ division est exiger"
        ]);
        Division::insert([
            "name"=>$request->division,
        ]);
        return redirect()->route('divisions.index');
    }


    //supprimer un division
    public function supprimer($id){


        Division::findOrFail($id)->delete();

        return redirect()->route('divisions.index');
    }

    //filtrer les service par devision
    public function filtrer($id,$division){
        $services = Service::where("divisions_id",$id)->get();

        return view('pages.divisions.filtrer',compact('services','division'));
    }

    //modifier la division
    public function modifier($id){
        $division = Division::findOrFail($id);
        return view('pages.divisions.modification',compact('division'));
    }
    public function edit($id,Request $request){
        Division::findOrFail($id)->update([
            'name'=>$request->division
        ]);
       return redirect()->route('divisions.index');
    }

}
