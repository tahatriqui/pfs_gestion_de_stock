<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Materiel;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    public function index(){
      $categories =  Category::all();

        return view('pages.categorie.index',compact('categories'));
    }

    public function ajouter(){
        return view('pages.categorie.ajouter');
    }

    public function add(Request $request){
        $request->validate([
            "categorie"=>'required|unique:categories,categorie'
        ],[
            'categorie.required'=>"le champs de categorie est obligatoire"
        ]);
        Category::insert([
            'categorie'=>$request->categorie
        ]);
        return redirect()->route('categorie.index')->with(["suc"=>"ajouter avec succeés"]);
    }

    //modification vue
    public function modification($id) {
        $categorie = Category::findOrFail($id);
        return view('pages.categorie.modification',compact('categorie'));
    }

    //modification fonction
    public function edit(Request $request,$id){
        $request->validate([
            "categorie"=>'required'
        ]);
        Category::findOrFail($id)->update([
            'categorie'=>$request->categorie
            ]);
        return redirect()->route('categorie.index')->with(["mod"=>"modifier avec succes"]);
        }

    //delete function
    public function delete($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('categorie.index');
    }

    //filtre function
    public function filtre($id){
        $categorie = Category::findOrFail($id);
        $materiel = Materiel::where("categories_id",$id)->get();

        return view('pages.categorie.filtre',compact('materiel','categorie'));
    }


}
