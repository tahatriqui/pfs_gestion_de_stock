<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class marqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('pages.marque.index', compact("marques"));
    }

    public function ajouterPage()
    {
        return view('pages.marque.ajouterPage');
    }
    public function ajouter(Request $request)
    {
        $request->validate([
            'marque' => "required"
        ]);
        Marque::insert(
            [
                'marque' => $request->marque,
            ]
        );
        return redirect()->route('marque.index');
    }

    public function modifierPage($id)
    {
        $marque = Marque::findOrFail($id);
        return view('pages.marque.modifier', compact('marque'));
    }

    public function edit(Request $request,$id)
    {
        $request->validate(["marque"=>"required"]);
        Marque::findOrFail($id)->update([
            "marque"=>$request->marque,
        ]);
        return redirect()->route('marque.index');
    }

    public function delete($id)
    {

        Marque::findOrFail($id)->delete();
        return redirect()->route('marque.index');
    }
}
