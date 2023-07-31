<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
    protected $table = "devis";
    protected $guarded = ['id'];


    public function mode(){
        return $this->belongsTo(Mode::class, "mode_id");
    }

    public function prestation(){
      return $this->belongsTo(Prestation::class, "mode_id");
  }

   
    public function ville()
    {
      return $this->belongsTo(Ville::class, "ville_id");
    }
    

}
