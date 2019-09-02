<?php

namespace AppBundle\Controller;

use AppBundle\Entity\File;
use AppBundle\Entity\FileTypeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\FileUploader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File as PDF;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
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

        return $this->render('file/index.html.twig', array(
            'files' => $files,
        ));
    }

    /**
     * Creates a new file entity.
     *
     * @Route("/new", name="file_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, FileUploader $fileUploader)
    {
        $file = new File();
        $form = $this->createForm('AppBundle\Form\FileTypeType', $file);
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

            return $this->redirectToRoute('file_index');
        }

        return $this->render('file/new.html.twig', array(
            'file' => $file,
            'form' => $form->createView(),
        ));
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

        return $this->render('file/show.html.twig', array(
            'file' => $file,
            'delete_form' => $deleteForm->createView(),
        ));
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
        $form = $this->createDeleteForm($file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $filename = $file->getFilename();
      
            // $path = $this->container->getParameter('kernel.root_dir') . '/../web/uploads/invoices/'.$filename);
            // $id = $file->getId();
            // $fileSystem->remove(['/web/uploads/invoices/', $filename]);
      
                unlink('../web/uploads/invoices/'.$filename);
          
            $em = $this->getDoctrine()->getManager();
            $em->remove($file);
            $em->flush();
        }

        return $this->redirectToRoute('file_index');
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
            ->setAction($this->generateUrl('file_delete', array('id' => $file->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @Route("/download/{id}", name="download_file")
    **/
    public function downloadFileAction(File $file){
        $file = $file->getFilename();
        $response = new BinaryFileResponse('../web/uploads/invoices/'.$file.'');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,'pdf.pdf');
        return $response;
    
    }
}
