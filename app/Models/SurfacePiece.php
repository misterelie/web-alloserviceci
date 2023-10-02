<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurfacePiece extends Model
{
    use HasFactory;
    protected $table = "surface_pieces";
    protected $guarded = ['id'];
    protected $fillable = ["libelle_surface_piece", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function devis(){
        return $this->hasMany(Devi::class);
    }
}
