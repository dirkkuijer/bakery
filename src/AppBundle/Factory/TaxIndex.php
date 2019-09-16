<?php

namespace AppBundle\Factory;

use Symfony\Component\HttpFoundation\JsonResponse;

class TaxIndex
{
    public function newSpreadsheet($invoices)
    {   
    
        try {
            $invoices[] = $invoices;
            // $invoices = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('../src/AppBundle/Factory/excel/overzicht btw.xlsx');
            $filename = 'btw aangifte-' . date('m-y');
            $columnArray = array_chunk($invoices, 1);
            $sheet = $spreadsheet->getActiveSheet()->fromArray($columnArray, null, 'A7');
            $columnArray = array_chunk($invoices, 1);
            $sheet = $spreadsheet->getActiveSheet()->fromArray($columnArray, null, 'F7');

            $sheet->setCellValue('B1', date('Y'));
            $mmaand = date('m');
            $totMaand = $maand + 3;
            $sheet->setCellValue('B2', $maand . ' t/m ' . $totMaand);

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('../web/uploads/tax/' . $filename . '.xls');
            echo '<div class="flash-succes">Overzicht is aangemaakt.</div>';
        } catch (\Exception $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }
}
