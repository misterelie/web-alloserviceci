<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartMode extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "depart_modes";
    protected $guarded = ['id'];
    protected $fillable =  ["titre", "user_id", "mode_departement_id", "departement_id", "description", 'image_prestation'];


    public function departement(){
        return $this->belongsTo(Departement::class, "departement_id");
    } 

    public function modedepartement(){
        return $this->belongsTo(ModeDepartement::class, "mode_departement_id");
    }
    

}
