<?php

namespace App\Repositories;

class Theatis {
    public static function getById($id)
    {
        $ret = \DB::select('SELECT *
            FROM theatis
            WHERE ΘΕ_ID = :id', compact('id'));

        return count($ret) ? $ret[0] : null;
    }
}
