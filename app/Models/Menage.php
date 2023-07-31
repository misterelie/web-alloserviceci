<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menage extends Model
{
    use HasFactory;
    protected $table = "menages";
    protected $guarded = ['id'];
    protected $fillable = ["slug", "libelle", "image_menage", "details", "user_id", "mode_prestation_id"];

    //* Mode
    public function mode(){
        return $this->belongsTo(ModePrestation::class, "mode_prestation_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function devis()
    {
        return $this->belongsTo(Devi::class);
    }

    


}
