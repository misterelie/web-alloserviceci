<?php
namespace App\Helpers;

use App\Models\Departement;

final class NavMenu 
{
    
    public static function departements(){
        $rows = Departement::limit(5)->get();
        return !is_null($rows) ? $rows : NULL;
    }

    /**
     * Vérifier si des données|clés sont définis
     *
     * @param array|string|null $keys
     * @return integer
     */
    public static function validate(array|string $keys = null): bool
    {
        $c = 0;
        if (is_string($keys)) {
            if (!isset($keys) || is_null($keys) || empty(trim($keys))) {
                $c +=  1;
            } else {
                $c +=  0;
            }
        }
        if (is_array($keys)) {
            foreach ($keys as $k) {
                if (!isset($k) || is_null($k) || empty(($k))) {
                    $c +=  1;
                } else {
                    $c +=  0;
                }
            }
        }
        return ($c > 0) ? true : false;
    }

    public static function validated(array|string $keys = null): bool
    {
        $c = 0;
        if (is_string($keys)) {
            if (!isset($keys) || is_null($keys) || empty(trim($keys))) {
                $c +=  1;
            } else {
                $c +=  0;
            }
        }
        if (is_array($keys)) {
            foreach ($keys as $k) {
                if (!isset($k) || is_null($k) || empty(($k))) {
                    $c +=  1;
                } else {
                    $c +=  0;
                }
            }
        }
        return ($c > 0) ? true : false;
    }

    /**
     * Undocumented function
     *
     * @param integer|null $statut
     * @return void
     */
    public static function statut(int $archived = null){
        $span = null;
        if($archived === 0){ $span = '<small class="badge bg-warning mob-block">   En cours  </small>';}
        
        if($archived === 1)  { $span = '<small class="badge bg-success mob-block">   Retenu(e)  </small>';}

        if($archived === 2){ $span = '<small class="badge bg-danger mob-block">   Refusé(e)  </small>' ;}
    
        if($archived === 3){ $span = '<small class="badge bg-archive mob-block"> Archivé </small>' ;}
        return $span;
    }

}