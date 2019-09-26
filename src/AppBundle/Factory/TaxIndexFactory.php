<?php

namespace AppBundle\Factory;

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

            $filename = 'SJHB btw aangifte';

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('../private/upload/tax/' . $filename . '.xls');

            echo '<div class="flash-success">Overzicht ' . '"' . $filename . '"' . ' is aangemaakt.</div>';
        } catch (\Expetion $ex) {
            echo '<div class="flash-error">Er is wat fout gegaan:</div> ' . $ex;

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
