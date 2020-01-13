<?php

namespace App\Repositories;

class Axiologisi {
    public static function getByTheatisId($id) {
        $ret = \DB::select('
            SELECT * FROM `axiologisi_paragwgis_apo_theati`
            JOIN (SELECT `ΘΠ_ID`, `Τίτλος` FROM `theatriki_paragwgi`) AS `t1`
            ON `axiologisi_paragwgis_apo_theati`.`ΘΠ_ID` = `t1`.`ΘΠ_ID`
            WHERE ΘΕ_ID = :id
        ', compact('id'));

        return $ret;
    }

    public static function getByTheatrikiParagwgiId($id) {
        $ret = \DB::select('
            SELECT * FROM `axiologisi_paragwgis_apo_theati`
            JOIN `theatis` AS `t1`
            ON `axiologisi_paragwgis_apo_theati`.`ΘΕ_ID` = `t1`.`ΘΕ_ID`
            WHERE ΘΠ_ID = :id
        ', compact('id'));

        return $ret;
    }

    public static function create($paragwgi_id, $theatis_id, $vathmologia, $perigrafi) {
        $ret = \DB::insert('
                INSERT INTO `axiologisi_paragwgis_apo_theati`
                (`ΘΠ_ID`, `ΘΕ_ID`, `Βαθμολογία`, `Περιγραφή`)
                VALUES (:paragwgi_id, :theatis_id, :vathmologia, :perigrafi)',
                compact('paragwgi_id', 'theatis_id', 'vathmologia', 'perigrafi'));
    }
}
