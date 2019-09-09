<?php

namespace AppBundle\Controller;

use AppBundle\Entity\File;
use AppBundle\Form\FileTypeType;
use AppBundle\Service\CheckFile;
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
                $checkFile = new CheckFile();
                $dateFile = $file->getDate();
                $dateFile = $checkFile->checkYear($dateFile);

                if ($dateFile) {
                    unlink('../web/uploads/invoices/' . $filename);

                    $em = $this->getDoctrine()->getManager();
                    $em->remove($file);
                    $em->flush();

                    // Added by Dirk
                    $state = 'Bestand is verwijderd.';
                    $succes = 'succes';
                    $this->showFlash($succes, $state);
                } else {
                    $state = 'Niet toegestaan: Bestand is niet ouder dan 7 jaar.';
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
