<?php

namespace AppBundle\Controller;

use AppBundle\Entity\File;
use AppBundle\Form\FileTypeType;
use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * File controller.
 *
 * @Route("file")
 */
class FileController extends Controller
{
    /**
     * Lists all file entities.
     *
     * @Route("/", name="file_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $files = $em->getRepository('AppBundle:File')->findAll();

        return $this->render('file/index.html.twig', [
            'files' => $files,
        ]);
    }

    /**
     * Creates a new file entity.
     *
     * @Route("/new", name="file_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, FileUploader $fileUploader, FileTypeType $fileType)
    {
        try {
            $file = new File();
            $form = $this->createForm(FileTypeType::class, $file, [
                'action' => $this->generateUrl('file_new'),
            ]);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $fileName = $form['filename']->getData();
                if ($fileName) {
                    $name = $fileUploader->upload($fileName);
                    $file->setFilename($name);
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($file);
                $em->flush();

                // Added by Dirk
                $state = 'Bestand is opgeslagen.';
                $succes = 'succes';
                $this->showFlash($succes, $state);

                $route = 'file_index';

                return new JsonResponse(['redirectToRoute' => $this->generateUrl($route, ['type' => $fileType])], 200);

                return $this->redirectToRoute('file_index');
            }
            if ($form->isSubmitted() && !$form->isValid()) {
                return new JsonResponse(['message' => (string) $form->getErrors(true, false)], 500);
            }

            return $this->render('file/content.html.twig', [
                'file' => $file,
                'form' => $form->createView(),
            ]);
        } catch (\Expetion $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }

    /**
     * Finds and displays a file entity.
     *
     * @Route("/{id}", name="file_show")
     * @Method("GET")
     */
    public function showAction(File $file)
    {
        $deleteForm = $this->createDeleteForm($file);

        return $this->render('file/show.html.twig', [
            'file' => $file,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    // added by Dirk to show flash messages after submitting form
    public function showFlash(String $status, String $state)
    {
        return $this->addFlash($status, $state);
    }

    // /**
    //  * Displays a form to edit an existing file entity.
    //  *
    //  * @Route("/{id}/edit", name="file_edit")
    //  * @Method({"GET", "POST"})
    //  */
    // public function editAction(Request $request, File $file)
    // {
    //     $deleteForm = $this->createDeleteForm($file);
    //     $editForm = $this->createForm('AppBundle\Form\FileTypeType', $file);
    //     $editForm->handleRequest($request);

    //     if ($editForm->isSubmitted() && $editForm->isValid()) {

    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('file_edit', array('id' => $file->getId()));
    //     }

    //     return $this->render('file/index.html.twig', array(
    //         'file' => $file,
    //         'edit_form' => $editForm->createView(),
    //         'delete_form' => $deleteForm->createView(),
    //     ));
    // }

    /**
     * Deletes a file entity.
     *
     * @Route("delete/item/{id}", name="file_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, File $file, Filesystem $fileSystem)
    {
        try {
            $form = $this->createDeleteForm($file);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $filename = $file->getFilename();

                $dateToday = date('d-m-Y');
                $dateToday = substr($dateToday, 6, 4);

                $dateFile = $file->getDate();
                $dateFile = $this->CheckYear($dateFile);

                // $dateFile = (int) $dateFile;
                // $dateToday = (int) $dateToday;

                dump($dateFile);
                dump($dateToday);
                die();
                if ($dateToday == $dateFile) {
                    unlink('../web/uploads/invoices/' . $filename);

                    $em = $this->getDoctrine()->getManager();
                    $em->remove($file);
                    $em->flush();

                    // Added by Dirk
                    $state = 'Bestand is verwijderd.';
                    $succes = 'succes';
                    $this->showFlash($succes, $state);
                } else {
                    $state = 'Niet ouder dan 7 jaar. Bestand wordt niet verwijderd.';
                    $succes = 'succes';
                    $this->showFlash($succes, $state);

                    return $this->redirectToRoute('file_index');
                }
            }

            return $this->redirectToRoute('file_index');
        } catch (\Exception $ex) {
            return new JsonResponse(['message' => (string) $ex->getMessage()], 500);
        }
    }

    public function CheckYear($dateFile)
    {
        $dateFile = date_add($dateFile, date_interval_create_from_date_string('7 years'));
        $dateFile = date_format($dateFile, 'd-m-Y');

        return substr($dateFile, 6, 4);
    }

    /**
     * @Route("/download/{id}", name="download_file")
     */
    public function downloadFileAction(File $file)
    {
        $file = $file->getFilename();
        $response = new BinaryFileResponse('../web/uploads/invoices/' . $file . '');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, '' . $file . '.pdf');

        return $response;
    }

    /**
     * Creates a form to delete a file entity.
     *
     * @param File $file The file entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(File $file)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('file_delete', ['id' => $file->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
