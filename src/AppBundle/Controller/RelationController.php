<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use AppBundle\Entity\Relation;
use AppBundle\Form\RelationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Relation controller.
 *
 * @Route("relation")
 */
class RelationController extends Controller
{
    /**
     * Lists all relation entities.
     *
     * @Route("/", name="relation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        // $invoices = new Invoice();

        $relations = $em->getRepository('AppBundle:Relation')->findAll();
        $invoices = $em->getRepository('AppBundle:Invoice')->findAll();

        return $this->render('relation/index.html.twig', [
            'relations' => $relations,
            'invoices' => $invoices,
        ]);
    }

    /**
     * Creates a new relation entity.
     *
     * @Route("/new", name="relation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $relation = new Relation();
        $form = $this->createForm(RelationType::class, $relation, [
            'action' => $this->generateUrl('relation_new'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($relation);
            $em->flush();

            return $this->redirectToRoute('relation_index');
        }

        return $this->render('relation/content.html.twig', [
            'relation' => $relation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a relation entity.
     *
     * @Route("/{id}", name="relation_show")
     * @Method("GET")
     */
    public function showAction(Relation $relation)
    {
        $deleteForm = $this->createDeleteForm($relation);

        return $this->render('relation/show.html.twig', [
            'relation' => $relation,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing relation entity.
     *
     * @Route("/{id}/edit", name="relation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Relation $relation)
    {
        $deleteForm = $this->createDeleteForm($relation);
        $editForm = $this->createForm(RelationType::class, $relation, [
            'action' => $this->generateUrl('relation_edit', ['id' => $relation->getId()]),
        ]);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('relation_index', ['id' => $relation->getId()]);
        }

        return $this->render('relation/content.html.twig', [
            'relation' => $relation,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a relation entity.
     *
     * @Route("/delete/item/{id}", name="relation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Relation $relation)
    {
        $form = $this->createDeleteForm($relation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($relation);
            $em->flush();
        }

        return $this->redirectToRoute('relation_index');
    }

    /**
     * Creates a form to delete a relation entity.
     *
     * @param Relation $relation The relation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Relation $relation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('relation_delete', ['id' => $relation->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
