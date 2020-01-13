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

        return count($ret) ? $ret[0] : null;
    }

    public static function getAll() {
        $ret = \DB::select('SELECT * FROM sintelestis');

        return $ret;
    }

    public static function delete($paragwgi_id, $sintelestis_id, $idiotita)
    {
        \DB::delete('
            DELETE FROM `sintelestis_me_idiotita_se_paragwgi`
            WHERE
                ΘΠ_ID = :paragwgi_id
            AND
                Σ_ID = :sintelestis_id
            AND
                Ιδιότητα = :idiotita
            LIMIT 1;
        ', compact('paragwgi_id', 'sintelestis_id', 'idiotita'));
    }
}
