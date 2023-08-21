<?php
namespace App\Helpers;

use App\Models\Departement;

final class NavMenu 
{
    
    public static function departements(){
        $rows = Departement::limit(5)->get();
        return !is_null($rows) ? $rows : NULL;
    }
}