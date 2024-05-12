<?php
namespace App\Http\Controllers;

use App\Models\User; // Add this line to import the User model
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division; // Add this line to import the Division model
use Illuminate\Http\Request;

class userController extends Controller
{
    public function show()
    {
        $divisions = Division::all();
        return view('pages.user.user', compact('divisions'));
    }

    public function ajouter(Request $request)
    {
        // Validation du request
        $request->validate([
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'cin' => 'required|string|unique:users,cin|max:25',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|unique:users,telephone|string|max:25',
           
        ],[
            'nom.required' => 'Le champ nom est obligatoire.',
            'prenom.required' => 'Le champ prénom est obligatoire.',
            'cin.required' => 'Le champ CIN est obligatoire.',
            'cin.unique' => 'Ce numéro de CIN est déjà utilisé.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'telephone.required' => 'Le champ téléphone est obligatoire.',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé.',

        ]);

        // Insérer dans la base de données
        User::insert([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cin' => $request->cin,
            'email' => $request->email,
            'telephone' => $request->telephone,

        ]);

        // Rediriger vers la vue
        return redirect()->route('show.user');
    }

    public function showuser()
    {
        // Charger les utilisateurs avec la relation 'division'
        $users = User::all();

        return view('pages.user.userShow', compact('users'));
    }

    public function modifier(Request $request,$id){

        $user = User::findOrFail($id);

        $divisions = Division::all();



        return view("pages.user.modification" ,compact('divisions',"user"));
    }
        public function edit(Request $request,$id){


            User::findOrFail($id)->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'cin' => $request->cin,
                    'email' => $request->email,
                    'telephone' => $request->telephone,

                ]);

                return redirect()->route('show.user');
        }

        public function supprimer($id){
            User::findOrFail($id)->delete();
            return redirect()->route('show.user');
        }

}

