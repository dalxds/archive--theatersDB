<?php

namespace App\Repositories;

class Sintelestis {
    public static function getByParagwgiId($id) {
        $ret = \DB::select(
            'SELECT Όνομα, Επώνυμο, Ιδιότητα, T1.Σ_ID
            FROM sintelestis_me_idiotita_se_paragwgi
            JOIN (SELECT Όνομα, Επώνυμο, Σ_ID FROM sintelestis) AS T1
            ON sintelestis_me_idiotita_se_paragwgi.Σ_ID = T1.Σ_ID
            WHERE sintelestis_me_idiotita_se_paragwgi.ΘΠ_ID = :id'
        , compact('id'));

        return $ret;
    }

    public static function getById($id) {
        $ret = \DB::select(
            'SELECT * FROM sintelestis
            WHERE Σ_ID = :id', compact('id'));

        return $ret;
    }
}
