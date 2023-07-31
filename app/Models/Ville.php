<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $table = "villes";
    protected $guarded = ['id'];
    protected $fillable = ["user_id","libelle"];

    // public function communes()
    // {
    //     return $this->hasMany(Commune::class);
    // }

    public function communes(){
        return $this->hasMany(Menage::class, "ville_id");
    }

    public function devis(){
        return $this->hasMany(Devi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
