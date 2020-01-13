<?php

namespace App\Repositories;

class Eisitirio {
    public const SEATS_PER_ROW = 10;
    public const REDUCED_COUNT_RATIO = 0.3;
    public const REDUCED_PRICE_RATIO = 0.5;

    public static function createAllForParastasi($paragwgi_id, $parastasi_id, $price)
    {
        $parastasi = \App\Repositories\Parastasi::getById($parastasi_id);

        $aithousa_name = $parastasi->Όνομα_Αίθουσας;
        $theatro_id = $parastasi->Θ_ID;

        $aithousa = \App\Repositories\Aithousa::getByTheatroAndAithousaId($theatro_id, $aithousa_name);

        $cap = $aithousa->Χωρητικότητα;

        $rows = intdiv($cap, self::SEATS_PER_ROW);

        $reduced_price_count = ceil($cap * self::REDUCED_COUNT_RATIO);
        $reduced_price = self::REDUCED_PRICE_RATIO * $price;

        $row = 1;
        $seat = 1;
        for ($i = 0; $i < $cap; $i++) {
            if ($seat > self::SEATS_PER_ROW) {
                $row++;
                $seat = 1;
            }

            $data = [
                'theatro_id' => $paragwgi_id,
                'parastasi_id' => $parastasi_id,
                'row' => $row,
                'seat' => $seat,
                'ticket_type' => ($i <= $reduced_price_count) ? 'ΜΕΙΩΜΕΝΟ' : 'ΚΑΝΟΝΙΚΟ',
                'price' => ($i <= $reduced_price_count) ? $reduced_price : $price
            ];

            \App\Repositories\Eisitirio::createOne($data);

            $seat++;
        }
    }

    public static function createOne($data)
    {
        \DB::insert('
        INSERT INTO `eisitirio` (`ΘΠ_ID`, `Π_ID`, `Σειρά`, `Θέση`, `Τύπος Εισιτηρίου`, `Τιμή`)
        VALUES(:theatro_id, :parastasi_id, :row, :seat, :ticket_type, :price)', $data);
    }

    public static function getCount($paragwgi_id, $parastasi_id, $type = 'ΚΑΝΟΝΙΚΟ')
    {
        $ret = \DB::select('SELECT COUNT(*) AS c
            FROM eisitirio
            WHERE ΘΠ_ID = :paragwgi_id
            AND Π_ID = :parastasi_id
            AND ΘΕ_ID IS NULL
            AND `Τύπος Εισιτηρίου` = :type', compact('paragwgi_id', 'parastasi_id', 'type'));

        return $ret[0]->c;
    }

    public static function checkinByParastasiId($parastasi_id, $theatis_id, $type)
    {
        \DB::update('
            UPDATE `eisitirio`
            SET `ΘΕ_ID` = :theatis_id
            WHERE `Π_ID` = :parastasi_id
            AND `Τύπος Εισιτηρίου` = :type
            AND `ΘΕ_ID` IS NULL
            LIMIT 1',
            compact('theatis_id', 'type', 'parastasi_id')
        );
    }

    public static function getByParastasiIdForSpectator($parastasi_id, $theatis_id)
    {
        $ret = \DB::select('
            SELECT * FROM eisitirio
            WHERE ΘΕ_ID = :theatis_id
            AND Π_ID = :parastasi_id', compact('parastasi_id', 'theatis_id'));

        return $ret;
    }

    public static function getAllOfSpectator($theatis_id)
    {
        $ret = \DB::select('
                SELECT * FROM eisitirio
                JOIN parastasi
                    ON parastasi.Π_ID = eisitirio.Π_ID
                JOIN theatriki_paragwgi
                    ON parastasi.ΘΠ_ID = theatriki_paragwgi.ΘΠ_ID
                JOIN theatro
                    ON theatro.Θ_ID = parastasi.Θ_ID
                WHERE ΘΕ_ID = :theatis_id
        ', compact('theatis_id'));

        return $ret;
    }
}
