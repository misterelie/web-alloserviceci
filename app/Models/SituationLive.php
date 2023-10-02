<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituationLive extends Model
{
    use HasFactory;
    protected $table = "situation_lives";
    protected $guarded = ['id'];
    protected $fillable = ["libelle", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function devis(){
        return $this->hasMany(Devi::class);
    }
}
