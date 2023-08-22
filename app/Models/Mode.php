<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    use HasFactory;
    protected $table = "modes";
    protected $guarded = ['id'];

    //* Adhesion :
    public function demandes(){
        return $this->hasMany(DemandePrestation::class, "mode_id");
    }

    public function prestataires(){
        return $this->hasMany(DevenirPrestataire::class, "mode_id");
    }

    public function prestations(){
        return $this->hasMany(Prestation::class, 'mode_id');
    }

    
    public function departement(){
        return $this->belongsTo(Departement::class, "departement_id");
    }

}
