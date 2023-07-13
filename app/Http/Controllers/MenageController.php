<?php

namespace App\Http\Controllers;

use App\Models\Descrptmenageregulier;
use App\Models\Menage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DateTime;


class MenageController extends Controller
{
    public function index(){
        $data['reguliers'] = Menage::orderBy('id','ASC')->get();
        return view('admin.menages.regulier')->with($data);
    }

    public function presentation_menage_regulier(){
        $data['describes'] = Descrptmenageregulier::orderBy('id', 'ASC')->get();
        return view('admin.menages.presentation')->with($data);
    }

    public function save_descript_menage_regulier(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
    
        ]);

        $describes = Descrptmenageregulier::create([
            'titre'=> $request->titre,
            "description" => $request->description,
        ]);

        if($describes)
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Descrptmenageregulier  $describe
     * @return \Illuminate\Http\Response
     */
    public function update_desciption_regulier(Request $request, Descrptmenageregulier $describe)
    {

        $array = [
            'titre'=> $request->titre,
            "description" => $request->description,
        ];

        if($describe->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    public function store(Request $request){
        $date = new DateTime();
        $request->validate([
            'libelle' => 'required',
            'details' => 'nullable'
        ],
        [
            'libelle' => 'Le titre est obligatoire',
           
        ]);

        $reguliers = New Menage();
        $reguliers->user_id = Auth::user()->id;
        if ($request->hasFile("image_menage")){
            $request->validate([
              'image_menage' => 'required',
            ]);
            $photo = $request->image_menage;
            $piece_name = time() . '.' . $request->libelle. $date->format('dmYhis'). '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('sources') , $piece_name);
            $reguliers->image_menage = $piece_name;
          }
        $reguliers->libelle = $request->libelle;
        $reguliers->details = $request->details;
        $reguliers->slug = Str::slug($reguliers->libelle. '-'.rand(00001, 99999));
        $reguliers->save();
        return redirect()->back()->with('success', 'Vous avez ajouté avec succès');
    }

    public function update(Request $request, Menage $regul)
    {
        $date = new DateTime();
        $regul->user_id = Auth::user()->id;
        $array = [
            'libelle'=> $request->libelle,
            'details'=> $request->details,
           
        ];
        $regul->slug = Str::slug($regul->libelle. ''.rand(00001, 99999));

        if ($request->hasFile("image_menage")){
            $request->validate([
              'image_menage' => 'required',
            ]);
            $photo = $request->image_menage;
            $piece_name = time() . '.' . $request->libelle. $date->format('dmYhis'). '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('sources') , $piece_name);
            $regul->image_menage = $piece_name;
          }
        
        if($regul->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menage  $realisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menage $regul)
    {
        $query = $regul->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }



    //MENAGE OCCASIONNEL
    public function index_occacionnel(){
        return view('admin.menages.occasionnel');
    }
}
