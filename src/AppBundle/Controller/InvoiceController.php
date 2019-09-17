<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use AppBundle\Form\InvoiceType;
use Ps\PdfBundle\Annotation\Pdf;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Invoice controller.
 *
 * @Route("invoice")
 */
class InvoiceController extends Controller
{
    /**
     * Lists all invoice entities.
     *
     * @Route("/", name="invoice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $invoices = $em->getRepository('AppBundle:Invoice')->findAll();
        $relations = $em->getRepository('AppBundle:Relation')->findAll();

        return $this->render('invoice/index.html.twig', [
            'invoices' => $invoices,
            'relations' => $relations,
        ]);
    }

    /**
     * Creates a new invoice entity.
     *
     * @Route("/new", name="invoice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();

            $invoiceNumber = $em->getRepository('AppBundle:Invoice')->getLastInvoiceNumber();

            $invoice = new Invoice();
            $invoice->setInvoiceNumber($this->generateNewInvoiceNumber($invoiceNumber));

            $form = $this->createForm(InvoiceType::class, $invoice, [
                'action' => $this->generateUrl('invoice_new'),
            ]);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($invoice);
                $em->flush();

                // Added by Dirk
                $state = 'Factuur is opgeslagen.';
                $succes = 'succes';
                $this->showFlash($succes, $state);

                $route = 'invoice_index';

                return new JsonResponse(['redirectToRoute' => $this->generateUrl($route)], 200);
                // return $this->redirectToRoute('invoice_index');
            }

            if ($form->isSubmitted() && !$form->isValid()) {
                return new JsonResponse(['message' => (string) $form->getErrors(true, false)], 500);
            }

            return $this->render('invoice/content.html.twig', [
                'invoice' => $invoice,
                'form' => $form->createView(),
            ]);
        } catch (\Exception $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }

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

    /**
     * Finds and displays a invoice entity.
     *
     * @Route("/{id}", name="invoice_show")
     * @Method("GET")
     */
    public function showAction(Invoice $invoice, Request $request)
    {
        $deleteForm = $this->createDeleteForm($invoice);

        return $this->render('invoice/show.html.twig', [
            'invoice' => $invoice,
            'relation' => $invoice->getRelation(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing invoice entity.
     *
     * @Route("/{id}/edit", name="invoice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Invoice $invoice, InvoiceType $invoiceType)
    {
        try {
            $deleteForm = $this->createDeleteForm($invoice);
            $editForm = $this->createForm(InvoiceType::class, $invoice, [
                'action' => $this->generateUrl('invoice_edit', ['id' => $invoice->getId()]),
            ]);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                // Added by Dirk
                $state = 'Factuur is aangepast.';
                $this->showFlash('succes', $state);

                $route = 'invoice_index';

                return new JsonResponse(['redirectToRoute' => $this->generateUrl($route, ['type' => $invoiceType])], 200);

                return $this->redirectToRoute('invoice_index');
                // return $this->redirectToRoute('invoice_index', [
                //     'id' => $invoice->getId(),
                // ]);
            }
            if ($editForm->isSubmitted() && !$editForm->isValid()) {
                return new JsonResponse(['message' => (string) $editForm->getErrors(true, false)], 500);
            }

            return $this->render('invoice/content.html.twig', [
                'invoice' => $invoice,
                'form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ]);
        } catch (\Exception $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }

    /**
     * Deletes a invoice entity.
     *
     * @Route("/delete/item/{id}", name="invoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Invoice $invoice)
    {
        $form = $this->createDeleteForm($invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invoice);
            $em->flush();

            // Added by Dirk
            $state = 'Factuur is verwijderd.';
            $this->showFlash('succes', $state);
        }

        return $this->redirectToRoute('invoice_index');
    }

    // added by Dirk to show flash messages after submitting form
    public function showFlash(String $status, String $state)
    {
        return $this->addFlash($status, $state);
    }

    /**
     * begin van pdf toevoegingen
     *
     * @Route("/pdf/{id}", defaults={ "_format" = "pdf" }, name="invoice.pdf")
     * @Pdf(stylesheet="invoice/pdf/invoice.pdf.style.twig")
     * @Method({"GET"})
     */
    public function pdfInvoice(Request $request, Invoice $invoice)
    {
        return $this->render('invoice/pdf/invoice.pdf.twig', [
            'invoice' => $invoice,
            'relation' => $invoice->getRelation(),
        ]);
    }

    /**
     * Creates a form to delete a invoice entity.
     *
     * @param Invoice $invoice The invoice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Invoice $invoice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('invoice_delete', ['id' => $invoice->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
