<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;
    protected $table = "temoignages";
    protected $guarded = ['id'];
    protected $fillable = ["user_id","nom", "contact", "photo_person", "etat", "texte"];

    public function etatStatus($etatId){
        $etat = Etat::find($etatId);
        return $etat;
    }
}
