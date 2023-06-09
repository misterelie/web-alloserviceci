<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    use HasFactory;
    protected $table = "canals";
    protected $guarded = ['id'];

    //* Adhesion :
    public function adhesions(){
        return $this->hasMany(Adhesion::class, "canal_id")->where(["deleted" => 0]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "updated_by");
    }
}
