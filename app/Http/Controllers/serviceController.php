<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function index()
    {
        $services =  Service::get();
        return view('pages.services.index', compact('services'));
    }

    //ajouter_view
    public function ajouter()
    {
        $divisions = Division::all();
        return view('pages.services.ajoute', compact('divisions'));
    }
    //ajouter
    public function add(Request $resquest)
    {

        $resquest->validate([

            'service' => "required",
            "bureau" => "required",
            "div" => "required"

        ], [
            "service.required" => "le champs de service est obligatoire",
            "bureau.required" => "le champs de bureau est obligatoire",
            "div.required" => "le champs de division est obligatoire"
        ]);

        $divisions = Division::all();
        $service = Service::insert([
            "services" => $resquest->service,
            "bureau" => $resquest->bureau,
            "divisions_id" => $resquest->div
        ]);
        return redirect()->route('services.index');
    }

    //modifier
    public function modifier($id)
    {
        $service = Service::findOrFail($id);
        $divisions = Division::all();
        return view('pages.services.modification', compact('service', "divisions"));
    }

    public function edit(Request $resquest, $id)
    {
        $service = Service::findOrFail($id)->update([
            "services" => $resquest->service,
            "bureau" => $resquest->bureau,
            "divisions_id" => $resquest->div
        ]);

        return redirect()->route('services.index');
    }

    public function supprimer($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('services.index');
    }
}
