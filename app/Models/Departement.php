<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "departements";
    protected $guarded = ['id'];
    protected $fillable =  ["libelle", "user_id"];


    
    public function prestations(){
        return $this->hasMany(Prestation::class, "prestation_id");
    } 

    public function modes(){
        return $this->hasMany(Mode::class, "departement_id")->where(["deleted" => 0]);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
