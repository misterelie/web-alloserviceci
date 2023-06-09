<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;

    public function adhesions(){
        return $this->hasMany(DevenirPrestataire::class, "domaine_id")->where(["deleted" => 0]);
    }
}
