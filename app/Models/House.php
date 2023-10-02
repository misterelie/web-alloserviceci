<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $table = "houses";
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
