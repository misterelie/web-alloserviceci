<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alphabet extends Model
{
    use HasFactory;

    public function adhesions(){
        return $this->hasMany(Adhesion::class, "alphabet_id")->where(["deleted" => 0]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "updated_by");
    }

}
