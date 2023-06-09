<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandePrestation extends Model
{
    use HasFactory;
    protected $table = "demande_prestations";
    protected $guarded = ['id'];
    protected $fillable = 
           ["nom", "prenoms", "telephone", "email", "prestation_id", "mode_id", "salaire_propose", "age_demande", "ethnie_id", "date_demande", "heure_demande", "observation"];


           //* Ethnie
    public function ethnie(){
        return $this->belongsTo(Ethnie::class, "ethnie_id")->where(["deleted" => 0]);
    }
    public function prestation(){
        return $this->belongsTo(Prestation::class);
    }

    //* Mode
    public function mode(){
        return $this->belongsTo(Mode::class, "mode_id")->where(["deleted" => 0]);
    }
}
