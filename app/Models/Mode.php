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
        return $this->hasMany(DemandePrestation::class, "mode_id")->where(["deleted" => 0]);
    }

    public function prestataires(){
        return $this->hasMany(DevenirPrestataire::class, "mode_id")->where(["deleted" => 0]);
    }
}
