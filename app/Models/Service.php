<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $guarded = ['id'];
    protected $fillable = ["libelle", "description", "banniere_img", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
