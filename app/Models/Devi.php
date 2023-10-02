<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Devi extends Model
{
    protected $table = "devis";
    protected $guarded = ['id'];
    protected $fillable =  
    ["nom", "prenoms", "telephone", "email", "ville_id", "quartier", "departement_id", "commune_id", "date_execution", "heure_execution", "description_devis", "code", "slug", "user_id", "mode_departement_id", "house_id", "nbre_piece", "surface_piece_id", "situation_live_id"];

    public static function boot(){
      parent::boot();
      static::creating(function($model){
          $model->slug = Str::slug(request()->libelle); // tu remplaces {name} par le nom de du champ NOM du mode et aussi du département
      });
      static::updating(function($model){
          $model->slug = Str::slug(request()->libelle); // tu remplaces {name} par le nom de du champ NOM du mode et aussi du département
      });
  }

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

    public function commune()
    {
      return $this->belongsTo(Commune::class, "commune_id");
    }
    public function house()
    {
      return $this->belongsTo(House::class, "house_id");
    }

    public function surface()
    {
      return $this->belongsTo(SurfacePiece::class, "surface_piece_id");
    }

    public function situation()
    {
      return $this->belongsTo(SituationLive::class, "situation_live_id");
    }
    

}
