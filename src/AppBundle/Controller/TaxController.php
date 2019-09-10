<?php

namespace AppBundle\Controller;

require '/home/dirk/projects/bakery/vendor/autoload.php';

use AppBundle\Factory\TaxIndex;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
     * @Route("/", name="tax_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $invoices = $em->getRepository('AppBundle:Invoice')->findAll();
        $relations = $em->getRepository('AppBundle:Relation')->findAll();

        // $this->makeTaxIndex();
        $tax = new TaxIndex();
        $tax->newSpreadsheet();

        return $this->render('tax/index.html.twig', [
            'invoices' => $invoices,
            'relations' => $relations,
        ]);
    }
}
