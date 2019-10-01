<?php

namespace AppBundle\Factory;

use Symfony\Component\HttpFoundation\JsonResponse;

class InvoiceFactory
{
    public function generateNewInvoiceNumber($lastInvoiceNumber)
    {
        try {
            if ($lastInvoiceNumber) {
                $newInvoiceNumber = explode('-', $lastInvoiceNumber);
                //functie explode werkt op volgorde van array. zet deze om en je gegevens zijn null
                $yearLastInvoice = $newInvoiceNumber[0] . '-';
                $newInvoiceNumber = $newInvoiceNumber[1] + 1;

                $year = date('y') . '-';

                // bij het begin van een nieuw jaar het resetten van factuurnummer
                if ($yearLastInvoice != $year) {
                    $newInvoiceNumber = '001';
                }

                $zero = '';

                if (1 == strlen($newInvoiceNumber)) {
                    $zero = '00';
                } elseif (2 == strlen($newInvoiceNumber)) {
                    $zero = '0';
                } elseif (strlen(3 == $newInvoiceNumber)) {
                    $zero = '';
                }
                $array = [$year, $zero, $newInvoiceNumber];

                return $array[0] . $array[1] . $array[2];
            }
            $year = date('y') . '-';

            return $year . '001';
        } catch (\Exception $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }
}
