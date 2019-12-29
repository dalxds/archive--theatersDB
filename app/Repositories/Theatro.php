<?php

namespace App\Repositories;

class Theatro {
    public static function getById($id)
    {
        $ret = \DB::select('
                SELECT *
                FROM `theatro`
                WHERE `theatro`.`Θ_ID` = :id
            ', compact('id'));

        return count($ret) ? $ret[0] : null;
    }

    public static function getAllAithouses()
    {
        $ret = \DB::select(
            'select `Όνομα`,`Όνομα_Αίθουσας`,`Χωρητικότητα`,`theatro`.`Θ_ID`
                    from (`theatro` join `aithousa` on((`theatro`.`Θ_ID` = `aithousa`.`Θ_ID`)))'
        );

        return $ret;
    }
}
