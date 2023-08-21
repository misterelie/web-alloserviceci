<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModeDepartement extends Model
{
    use HasFactory;
    protected $table = "mode_departements";
    protected $guarded = ['id'];
    
    public static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->slug = Str::slug(request()->libelle); // tu remplaces {name} par le nom de du champ NOM du mode et aussi du département
        });
        static::updating(function($model){
            $model->slug = Str::slug(request()->libelle); // tu remplaces {name} par le nom de du champ NOM du mode et aussi du département
        });
    }

    public function devis(){
        return $this->hasMany(Devi::class, "mode_departement_id");
    }

    public function departmodes()
    {
        return $this->hasMany(DepartMode::class, 'mode_departement_id');
    }

    public function departements()
    {
        return $this->hasMany(Departement::class, 'departement_id');
    }

    

}
