<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModePrestation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menages(){
        return $this->hasMany(Menage::class, "mode_prestation_id");
    }

    public function devis(){
        return $this->hasMany(Devi::class, "mode_prestation_id");
    }
}
