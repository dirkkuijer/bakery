<?php

namespace AppBundle\Factory;

class CheckFileFactory
{   // Deze functie kijkt of een bestand ouder is dan 7 jaar i.v.m. fiscale verplichtingen.
    public function checkYear($dateFile)
    {
        $dateToday = date('d-m-Y');
        $dateToday = substr($dateToday, 6, 4);
        $dateToday = ($dateToday - 7);

        $dateFile = date_format($dateFile, 'd-m-Y');

        $dateFile = substr($dateFile, 6, 4);

        if ($dateFile < $dateToday || $dateFile == $dateToday) {
            return $dateFile = true;
        }

        return $dateFile = false;
    }
}
