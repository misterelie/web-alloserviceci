<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repassage extends Model
{
    use HasFactory;
    protected $table = "repassages";
    protected $guarded = ['id'];
    protected $fillable = ["slug", "libelle", "photos", "details", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
