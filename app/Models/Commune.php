<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table = "communes";
    protected $guarded = ['id'];
    protected $fillable = ["commune"];

    public function adhesions(){
        return $this->hasMany(Adhesion::class, "commune_id");
    }

    
}
