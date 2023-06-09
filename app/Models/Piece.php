<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $table = "pieces";
    protected $guarded = ['id'];

    public function adhesions(){
        return $this->hasMany(Adhesion::class, "piece_id");
    }

}
