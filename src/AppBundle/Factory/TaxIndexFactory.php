<?php

namespace AppBundle\Factory;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class TaxIndexFactory
{
    public function newTaxIndex($invoices, \DateTime $from, \DateTime $till)
    {
        try {
            $customerInvoices = $invoices->filter(function ($entity) {
                if ($entity->getRelation()->getKindOfRelation()) {
                    return $entity;
                }
            });
            $supplierInvoices = $invoices->filter(function ($entity) {
                if (!$entity->getRelation()->getKindOfRelation()) {
                    return $entity;
                }
            });

            $from = $from->format('d-m-Y');
            $till = $till->format('d-m-Y');
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('../src/AppBundle/Factory/excel/overzicht btw.xlsx');

            $sheet = $spreadsheet->getActiveSheet();

            $this->loopInvoice($customerInvoices, $sheet);
            $this->loopInvoice($supplierInvoices, $sheet);

            $sheet->setCellValue('B1', date('Y'));
            $sheet->setCellValue('B2', $from);
            $sheet->setCellValue('C2', ' t/m ' . $till);

            $filename = 'SJHB btw ' . date('d-m-y');

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('../web/uploads/tax/' . $filename . '.xls');

            echo '<div class="flash-succes">Overzicht ' . $filename . ' is aangemaakt.</div>';
        } catch (\Expetion $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }

    public function loopInvoice($invoices, $sheet)
    {
        foreach ($invoices as $invoice) {
            $cols = 1;
            if ($invoice->getRelation()->getKindOfRelation()) {
                $rows = 7;
            } else {
                $rows = 29;
            }
        }

        foreach ($invoices as $invoice) {
            $collInvoiceNumber = $invoice->getInvoiceNumber();
            $invoiceDate = $invoice->getDate();
            $collInvoiceDate = $invoiceDate->format('d-m-Y');
            $collName = $invoice->getRelation()->getName();
            $collAmountWithVat = $invoice->getAmountWithVat();
            $collVatAmount = $invoice->getVatAmount();
            $collAmount = $invoice->getAmount();
            // $collRelation = $invoice->getRelation()->getKindOfRelation();

            $rowArray = [
                $collInvoiceNumber,
                $collInvoiceDate,
                $collName,
                $collAmountWithVat,
                $collVatAmount,
                $collAmount,
                // $collRelation,
            ];
            foreach ($rowArray as $invoice) {
                if (6 == $cols) {
                    $sheet->setCellValueByColumnAndRow($cols, $rows, $invoice);
                    $cols = 1;
                    ++$rows;
                } else {
                    $sheet->setCellValueByColumnAndRow($cols, $rows, $invoice);
                    ++$cols;
                }
            }
        }
    }
}
    // public function excelResponse($spreadsheetObject, $title)
    // {
    //     $title = preg_replace('/[^a-zA-Z0-9\._-]+/', '-', $title);
    //     $filename = $title . '.xlsx';

    //     $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheetObject, 'Xls');
    //     ob_start();
    //     $writer->save('../web/uploads/tax/' . $filename . '.xls');
    //     $output = ob_get_contents();
    //     ob_end_clean();

    //     $response = new Response($output);

    //     $disposition = $response->headers->makeDisposition(
    //         ResponseHeaderBag::DISPOSITION_ATTACHMENT,
    //         $filename
    //     );

    //     // Set the content disposition
    //     $response->headers->set('Content-Disposition', $disposition);
    //     //$response->headers->set('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
    //     $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');
    //     $response->headers->set('Last-Modified', '' . gmdate('D, d M Y H:i:s') . ' GMT');
    //     $response->headers->set('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
    //     $response->headers->set('Cache-Control', 'max-age=1');
    //     $response->headers->set('Pragma', 'public');

    //     echo '<div class="flash-succes">Overzicht is aangemaakt.</div>';

    //     // Dispatch request
    //     return $response;
    // }
