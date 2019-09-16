<?php

namespace AppBundle\Service;

class CheckFile
{
    //TODO:::: kijk eens goed hoe dat zit met deze boolean! deze werkt niet.
    public function checkYear($dateFile)
    {
        $dateToday = date('d-m-Y');
        $dateToday = substr($dateToday, 6, 4);
        $dateToday = ($dateToday - 7);

        // $dateFile = date_add($dateFile, date_interval_create_from_date_string('7 years'));
        $dateFile = date_format($dateFile, 'd-m-Y');

        $dateFile = substr($dateFile, 6, 4);

        if ($dateFile < $dateToday || $dateFile == $dateToday) {
            return $dateFile = true;
        }

        return $dateFile = false;
    }
}
