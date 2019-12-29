<?php
namespace App\Repositories;

class Parastasi {

    /**
    "aithousa" => "Αίθουσα 1"
    "theatro" => 1
    "sezon" => "2020-2021"
    "enarxi" => "2021-12-29T12:59"
    "paragwgi_id" => 1
     */
    public static function create($data) {
        $timi = $data['timi'];
        unset($data['timi']);

        \DB::insert('INSERT INTO `parastasi`
            (`ΘΠ_ID`, `Θ_ID`, `Όνομα_Αίθουσας`, `Σεζόν`, `Έναρξη`)
            VALUES(:paragwgi_id, :theatro, :aithousa, :sezon, :enarxi)', $data);

        $parastasi_id = \DB::getPdo()->lastInsertId();
        \App\Repositories\Eisitirio::createAllForParastasi($data['paragwgi_id'], $parastasi_id, $timi);

        return $parastasi_id;
    }

    public static function getById($id) {
        $ret = \DB::select(
            'SELECT * FROM parastasi
            WHERE Π_ID = :id', compact('id'));

        return count($ret) ? $ret[0] : null;
    }

    public static function getByTheatrikiParagwgiId($id) {
        $ret = \DB::select('SELECT *
            FROM parastasi
            JOIN (SELECT Θ_ID, Όνομα FROM theatro) AS T2
            ON parastasi.Θ_ID = T2.Θ_ID
            WHERE ΘΠ_ID = :id', compact('id'));

        return $ret;
    }

    public static function getByTheatroId($id)
    {
        $ret = \DB::select('SELECT *
            FROM parastasi
            WHERE Θ_ID = :id', compact('id'));

        return $ret;
    }

    public static function getUpcomingByTheatroId($id)
    {
        $ret = \DB::select('SELECT *
            FROM parastasi
            JOIN (SELECT `Τίτλος` AS `Τίτλος_Παραγωγής`, `ΘΠ_ID` FROM theatriki_paragwgi) AS T1
            ON T1.ΘΠ_ID = parastasi.ΘΠ_ID
            WHERE Θ_ID = :id
                AND UTC_TIMESTAMP() < `Έναρξη`', compact('id'));

        return $ret;
    }
}
