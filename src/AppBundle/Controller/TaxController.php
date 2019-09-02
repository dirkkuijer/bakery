<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Invoice;
use AppBundle\Entity\Relation;
use Ps\PdfBundle\Annotation\Pdf;


/**
 * Tax controller.
 *
 * @Route("tax")
 */
class TaxController extends Controller
{
    /**
     * @Route("/", name="tax_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    { 
        $em = $this->getDoctrine()->getManager();

        $invoices = new Invoice();
        $invoice = new Invoice();
        $relations = new Relation();
        $invoices = $em->getRepository('AppBundle:Invoice')->findAll();
        $relations = $em->getRepository('AppBundle:Relation')->findAll();
        
        $totals[] = $em->getRepository('AppBundle:Invoice')->findAll();

        return $this->render('tax/index.html.twig', [
            'invoices' => $invoices,
            'relations' => $relations,
            'totals' => $totals,
        ]);
    }
    
    /**
     * begin van pdf toevoegingen
     *
     * @Route("/pdf/{id}", defaults={ "_format" = "pdf" }, name="tax.pdf")
     * @Pdf(stylesheet="tax/pdf/tax.pdf.style.twig")
     * @Method({"GET"})
     */
    public function pdfPowerplanAction(Request $request, Invoice $invoice)
    {
        return $this->render('tax/pdf/tax.pdf.twig', [
            'invoice' => $invoice,
            'relation' => $invoice->getRelation(),
        ]);
    }

}