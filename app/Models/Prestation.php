<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;
    protected $table = "prestations";
    protected $guarded = ['id'];
    protected $fillable = ["libelle", "image_prestation", "titre_banner", "mode_id", "departement_id"];

    //* Adhesion :
    public function demandes(){
        return $this->hasMany(DemandePrestation::class, "prestation_id")->where(["deleted" => 0]);
    }

    public function adhesions(){
        return $this->hasMany(DevenirPrestataire::class, "prestation_id")->where(["deleted" => 0]);
    }

    public function departement(){
        return $this->belongsTo(Departement::class, "departement_id");
    }

    public function mode(){
        return $this->belongsTo(Mode::class, "mode_id");
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
