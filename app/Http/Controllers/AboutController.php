<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function presentation(){
        $abouts = About::all();
        return view('admin.about', compact('abouts'));
    }

    public function store(Request $request){
        $request->validate([
            'titre' => 'required',
            'description' => 'required'
        ]);
        $abouts = new About();
        $abouts->titre = $request->titre;
        $abouts->description = $request->description;
        $abouts->save();
        return back()->with("success", "Vous avez ajouté avec succès !");
    }

    public function update(Request $request, About $about)
    {
       //dd($request->all());
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
           
        ]);
        if(!is_null($request->titre)){
            $about->titre = $request->titre;
        }
        if(!is_null($request->titre)){
            $about->description = $request->description;
        }
        $about->update();
        return redirect()->back()->with('success', 'Félicitations!  Votre mise  a jour été effectué avec succès ');
    }

    public function destroy_about($id){
        $about = About::find($id);
        $delete = $about->delete($id);
        if ($delete) {
            return back()->with("success", "Vous avez supprimé avec succès !");
        }
        return abort(500);
    }

}
