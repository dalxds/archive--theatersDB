<?php

namespace App\Repositories;

class Aithousa {
    public static function getByTheatroAndAithousaId($theatro_id, $aithousa_name)
    {
        $ret = \DB::select('SELECT *
            FROM aithousa
            WHERE Θ_ID = :theatro_id
            AND Όνομα_Αίθουσας = :aithousa_name', compact('theatro_id','aithousa_name'));

        return count($ret) ? $ret[0] : null;
    }
}
