<?php
namespace App\Repositories;

class TheatrikiParagwgi {
    /**
     * titlos
     * perigrafi
     * diarkeia
     * afm
     */
    public static function create($data) {
        \DB::insert('INSERT INTO `theatriki_paragwgi`
            (`Τίτλος`, `Περιγραφή`, `Διάρκεια`, `Εταιρεία_Παραγωγής`)
            VALUES(:titlos, :perigrafi, :diarkeia, :afm)', $data);

        return \DB::getPdo()->lastInsertId();
    }

    public static function getById($id) {
        $ret = \DB::select('SELECT * FROM `theatriki_paragwgi`
            WHERE `ΘΠ_ID` = :id', compact('id'));

        return count($ret) ? $ret[0] : null;
    }

    public static function getBySyntelestisId($id) {
        $ret = \DB::select('SELECT Τίτλος, Ιδιότητα, T1.ΘΠ_ID
            FROM sintelestis_me_idiotita_se_paragwgi
            JOIN (SELECT ΘΠ_ID, Τίτλος FROM theatriki_paragwgi) AS T1
            ON sintelestis_me_idiotita_se_paragwgi.ΘΠ_ID = T1.ΘΠ_ID
            WHERE sintelestis_me_idiotita_se_paragwgi.Σ_ID = :id', compact('id'));

        return count($ret) ? $ret[0] : null;
    }

    public static function getByEtairiaParagwgisId($id)
    {
        $ret = \DB::select('SELECT * FROM `theatriki_paragwgi`
            WHERE `Εταιρεία_Παραγωγής` = :id', compact('id'));

        return $ret;
    }

    public static function isOwnedByUser($id)
    {
        if (\Auth::check() && \Auth::user()->type == 1 && !is_null(\Auth::user()->ep_afm)) {

            $afm = \Auth::user()->ep_afm;
            $ret = \DB::select('SELECT COUNT(*) AS c FROM theatriki_paragwgi
                JOIN etairia_paragwgis
                ON etairia_paragwgis.ΑΦΜ = theatriki_paragwgi.Εταιρεία_Παραγωγής
                WHERE etairia_paragwgis.ΑΦΜ = :afm
                AND theatriki_paragwgi.ΘΠ_ID = :id',
            compact('afm', 'id'));

            if ($ret[0]->c > 0)
                return true;
        }

        return false;
    }
}
