<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    //
    public function add_domaine(){
        $domaines = Domaine::all();
        return view('admin.activity_domaine', compact('domaines'));
    }

    public function store_domaine(Request $request){
        $request->validate([
            'domaine' => 'required',
            
        ]);
        $domaines = new Domaine();
        $domaines->domaine = $request->domaine;
        $domaines->save();
        return redirect()->back()->with('success', 'Vous avez ajouté  avec succès ');
    }

    public function update_domaine_activity(Request $request, Domaine $domaine){
        $request->validate([
            'domaine' => 'required',
        ]);
       if (!is_null($request->domaine)) {
            $domaine->domaine = $request->domaine;
       }
        $domaine->update();
        return redirect()->back()->with('success', 'Opération effectuté avec succès ');
    }

    public function destroy_activity_domaine($id){
        $domaine = Domaine::find($id);
        $delete = $domaine->delete($id);
        if ($delete) {
            return back()->with("success", "Vous avez supprimé avec succès !");
        }
        return abort(500);
    }




}
