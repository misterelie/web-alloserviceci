<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table = "communes";
    protected $guarded = ['id'];
    protected $fillable = ["commune", "user_id", "ville_id"];

    public function adhesions(){
        return $this->hasMany(Adhesion::class, "commune_id");
    }

    // public function ville()
    // {
    //     return $this->belongsTo(Ville::class, "ville_id");
    // }

    public function ville(){
        return $this->belongsTo(ville::class, "ville_id");
    }

    public function devis(){
        return $this->hasMany(Devi::class);
    }

    
}
