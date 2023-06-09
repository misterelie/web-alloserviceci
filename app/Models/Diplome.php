<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;
    protected $table = "diplomes";
    protected $guarded = ['id'];
    protected $fillable = ["diplome"];

    //* Adhesion :
    public function adhesions(){
        return $this->hasMany(Adhesion::class, "diplome_id")->where(["deleted" => 0]);
    }
}
