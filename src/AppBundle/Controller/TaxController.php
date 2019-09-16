<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use AppBundle\Factory\TaxIndexFactory;
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
            $form = $this->createForm(TaxType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $dates = $form->getData();

                $from = $dates['from'];
                $till = $dates['till'];

                $em = $this->getDoctrine()->getManager();

                $invoices = $em->getRepository('AppBundle:Invoice')->getInvoiceInPeriod($from, $till);

                //functioneert niet???
                // in services.yml factory geregistreerd en geprobeerd parameters mee te geven,
                // maar dit is niet gelukt na het bestuderen van documentatie.
                $tax = new TaxIndexFactory();
                $tax->newSpreadsheet($invoices);

                $route = 'tax_search';

                //TODO: vragen Sander waarom deze regel de actie verstoord heeft?
                // return new JsonResponse(['redirectToRoute' => $this->generateUrl($route, ['type' => $invoices])], 200);

                return $this->render('tax/index.html.twig', [
                    'invoices' => $invoices,
                ]);
            }
            if ($form->isSubmitted() && !$form->isValid()) {
                return new JsonResponse(['message' => (string) $form->getErrors(true, false)], 500);
            }

            return $this->render('tax/search.html.twig', [
                'form' => $form->createView(),
            ]);
        } catch (\Exception $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }

    /**
     * @Route("/", name="tax_index")
     * @Method("POST")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // $from = date('2019-01-01');
        // $till = date('Y-m-d');

        // $invoices = $em->getRepository('AppBundle:Invoice')->getInvoiceInPeriod($from, $till);
        $invoices = $em->getRepository('AppBundle:Invoice')->findAll();
        // $relations = $em->getRepository('AppBundle:Relation')->findAll();

        // $tax = new TaxIndex();
        // $tax->newSpreadsheet($invoices);

        return $this->render('tax/index.html.twig', [
            'invoices' => $invoices,
        ]);
    }

    public function getInvoice()
    {
        $em = $this->getDoctrine()->getManager();

        return $invoiceNumbers = $em->getRepository('AppBundle:Invoice')->findAll();
    }

    public function showFlash(String $status, String $state)
    {
        return $this->addFlash($status, $state);
    }
}
