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

    public static function create() {
        \DB::insert('
            INSERT INTO `theatis` VALUES ()
        ');

        return \DB::getPdo()->lastInsertId();
    }

    public static function update($id, $data) {
        $ret = \DB::update('
            UPDATE `theatis` 
            SET
                `Όνομα` = :onoma,
                `Επώνυμο` = :epwnymo,
                `Email` = :email,
                `Τηλέφωνο` = :tilefwno
            WHERE ΘΕ_ID = :id
        ',
            array_merge(
                array_fill_keys(['onoma', 'epwnymo', 'email', 'tilefwno'], null),
                $data,
                compact('id')
            )
        );

        return $ret;
    }
}
