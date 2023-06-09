<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispo extends Model
{
    use HasFactory;
    protected $table = "dispos";
    protected $guarded = ['id'];
    protected $fillable = ["dispo"];

     //* Adhesion :
     public function adhesions(){
        return $this->hasMany(Adhesion::class, "dispo_id")->where(["deleted" => 0]);
    }


}
