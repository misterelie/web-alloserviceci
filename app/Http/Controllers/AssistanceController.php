<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    public function add_assist(){
        $assistances = Assistance::all();
        return view('admin.assistance', compact('assistances'));
    }

    public function store_assistance(Request $request){
        $request->validate([
            'telephone1' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'telephone2' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'telephone3' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'whatsapp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email:unique',
        ]);

        $assistances = new Assistance();
        $assistances->telephone1 = $request->telephone1;
        $assistances->telephone2 = $request->telephone2;
        $assistances->telephone3 = $request->telephone3;
        $assistances->whatsapp = $request->whatsapp;
        $assistances->email = $request->email;
        $assistances->save();
        return redirect()->back()->with('success', 'Vous avez ajouté  avec succès ');
    }

    public function update(Request $request, Assistance $assistance){
        $request->validate([
            'telephone1' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'telephone2' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'telephone3' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'whatsapp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email:unique',
        ]);

        if(!is_null($request->telephone1)){
            $assistance->telephone1 = $request->telephone1;
        }

        if (!is_null($request->telephone2)) {
            $assistance->telephone2 = $request->telephone2;
        }

        if (!is_null($request->telephone3)) {
            $assistance->telephone3 = $request->telephone3;
        }

        if (!is_null($request->whatsapp)) {
            $assistance->whatsapp = $request->whatsapp;
        }

        if (!is_null($request->email)) {
            $assistance->email = $request->email;
        }
        $assistance->update();
        return redirect()->back()->with('success', 'Félicitations!  Votre mise a été effectuté avec succès ');
    }

    public function delete_assistance(Assistance $assistance){
        $assistance->delete();
        return back()->with("success", "Vous avez supprimé avec succès !");
    }
}
