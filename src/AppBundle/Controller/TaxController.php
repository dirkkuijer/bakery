<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use AppBundle\Form\TaxType;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Tax controller.
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 * @Route("tax")
 */
class TaxController extends Controller
{
    /**
     * Creates a new invoice entity.
     *
     * @Route("/new", name="tax_search")
     * @Method("POST")
     */
    public function searchAction(Request $request)
    {
        try {
            $form = $this->createForm(
                TaxType::class,
                null,
                [
                    'action' => $this->generateUrl('tax_search'),
                ]
            );
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $dates = $form->getData();

                $from = $dates['from'];
                $till = $dates['till'];

                $em = $this->getDoctrine()->getManager();

                $invoices = $em->getRepository('AppBundle:Invoice')->getInvoiceInPeriod($from, $till);

                $tax = $this->get('AppBundle\Factory\TaxIndexFactory')->newTaxIndex($invoices, $from, $till);

                return $this->render('tax/index.html.twig', [
                    'invoices' => $invoices,
                ]);
            }
            if ($form->isSubmitted() && !$form->isValid()) {
                $this->addFlash('error', 'Ongeldige waarde ingevoerd, probeer het opnieuw.');
                return $this->redirectToRoute('tax_index');
                // return new JsonResponse(['message' => (string) $form->getErrors(true, false)], 500);
            }
            
            return $this->render('tax/search.html.twig', [
                'form' => $form->createView(),
                ]);
            } catch (\Exception $ex) {
                $this->addFlash('error', $ex);
                return $this->redirectToRoute('tax_index');
            // return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }

    /**
     * @Route("/", name="tax_index")
     * @Method("POST")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $invoices = $em->getRepository('AppBundle:Invoice')->findAll();

        return $this->render('tax/index.html.twig', [
            'invoices' => $invoices,
        ]);
    }

    public function getInvoice()
    {
        $em = $this->getDoctrine()->getManager();

        return $invoiceNumbers = $em->getRepository('AppBundle:Invoice')->findAll();
    }
}
