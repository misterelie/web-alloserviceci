<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
    protected $table = "devis";
    protected $guarded = ['id'];
    protected $fillable =  
    ["nom", "prenoms", "telephone", "email", "ville_id", "quartier", "departement_id", "commune_id", "date_execution", "heure_execution", "description_devis", "code", "slug", "user_id", "mode_departement_id"];

    // public function modes(){
    //     return $this->hasMany(ModeDepartement::class, "mode_departement_id");
    // }

    public function departement(){
      return $this->belongsTo(Departement::class, "departement_id");
  }

  public function  modedepartement(){
    return $this->belongsTo(ModeDepartement::class, "mode_departement_id");
}

   
    public function ville()
    {
      return $this->belongsTo(Ville::class, "ville_id");
    }
    

}
