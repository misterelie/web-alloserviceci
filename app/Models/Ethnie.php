<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ethnie extends Model
{
    use HasFactory;
    protected $table = "ethnies";
    protected $guarded = ['id'];
    protected $fillable = ["ethnie"];

     //* Adhesion :
     public function demandes(){
        return $this->hasMany(DemandePrestation::class, "ethnie_id")->where(["deleted" => 0]);
    }

    public function prestataires(){
        return $this->hasMany(DemandePrestation::class, "ethnie_id")->where(["deleted" => 0]);
    }

    
}
