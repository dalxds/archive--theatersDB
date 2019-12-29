<?php
namespace App\Repositories;

class EtairiaParagwgis {
    public static function getById($id)
    {
        $ret = \DB::select('SELECT *
            FROM etairia_paragwgis
            WHERE ΑΦΜ = :id', compact('id'));

        return count($ret) ? $ret[0] : null;
    }
}
