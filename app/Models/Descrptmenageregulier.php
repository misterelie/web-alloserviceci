<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descrptmenageregulier extends Model
{
    use HasFactory;
    protected $table = "descrptmenagereguliers";
    protected $guarded = ['id'];
    protected $fillable = ["titre","description", "user_id"];
}
