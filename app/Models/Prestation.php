<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;
    protected $table = "prestations";
    protected $guarded = ['id'];
    protected $fillable = ["libelle", "image_prestation", "titre_banner"];

    //* Adhesion :
    public function demandes(){
        return $this->hasMany(DemandePrestation::class, "prestation_id")->where(["deleted" => 0]);
    }

    public function adhesions(){
        return $this->hasMany(DevenirPrestataire::class, "prestation_id")->where(["deleted" => 0]);
    }
}
