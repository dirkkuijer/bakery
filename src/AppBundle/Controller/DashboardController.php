<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function indexAll(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $invoices = $em->getRepository('AppBundle:Invoice')->findAll();
        $relations = $em->getRepository('AppBundle:Relation')->findAll();

        return $this->render('dashboard.html.twig', [
            'invoices' => $invoices,
            'relations' => $relations,
        ]);
    }
}
