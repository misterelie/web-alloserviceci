<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "departements";
    protected $guarded = ['id'];
    protected $fillable =  ["libelle", "user_id", "mode_departement_id"];

    public static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->slug = Str::slug(request()->libelle); // tu remplaces {name} par le nom de du champ NOM du mode et aussi du département
        });
        static::updating(function($model){
            $model->slug = Str::slug(request()->libelle); // tu remplaces {name} par le nom de du champ NOM du mode et aussi du département
        });
    }

    public function prestations(){
        return $this->hasMany(Prestation::class, "prestation_id");
    } 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function departmode()
    {
        return $this->belongsTo(DepartMode::class, 'departement_id');
    }

    public function modes()
    {
        return $this->hasMany(ModeDepartement::class, 'departement_id');
    }

    





}
