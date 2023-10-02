<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevenirPrestataire extends Model
{
    use HasFactory;
    protected $table = "devenir_prestataires";
    protected $guarded = ['id'];
    protected $fillable = 
    [
        'nom',
        'prenoms',
        'civilite',
        'date_naiss',
        'situation_matri',
        'nbre_enfant',
        'telephone1',
        'telephone2',
        'whatsapp',
        'email',
        'ethnie_id',
        'commune_id',
        'quartier',
        'photo',
        'prestation_id',
        'annee_experience',
        'pretention_salairiale',
        'zone',
        'contact_urgence',
        'reference',
        'contact_reference',
        'alphabet_id',
        'diplome_id',
        'mode_id',
        'dispo_id',
        'piece_id',
        'numero_piece',
        'copy_piece',
        'canal_id',
        'copy_last_diplome', 
        'catalogue_realisa' ,
        'avis',
        'motif_archived',
        'archived',
        'deleted'
    ];

    //* Mode
    public function mode(){
        return $this->belongsTo(Mode::class, "mode_id");
    }

    public function ethnie(){
        return $this->belongsTo(Ethnie::class, "ethnie_id");
    }

    //* Alphabet 
    public function alphabet(){
        return $this->belongsTo(Alphabet::class, "alphabet_id");
    }

     //* Diplome :
     public function diplome(){
        return $this->belongsTo(Diplome::class, "diplome_id");
    }

    //* Dispo 
    public function dispo(){
        return $this->belongsTo(Dispo::class, "dispo_id");
    }

    //* Piece
    public function piece(){
        return $this->belongsTo(Piece::class, "piece_id");
    }

    //* Canal
    public function canal(){
        return $this->belongsTo(Canal::class, "canal_id");
    }

    //* Commune
    public function commune(){
        return $this->belongsTo(Commune::class, "commune_id");
    }

    public function prestation(){
        return $this->belongsTo(Prestation::class, "prestation_id");
    }
}
