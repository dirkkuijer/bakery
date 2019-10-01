<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     * @Method("GET")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $contactType = new ContactType();
        $form = $this->createForm(ContactType::class, null, [
            'action' => $this->generateUrl('contact'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $emailTo = $this->sanitizeAdress($contactFormData['to']);
            $contentMessage = $this->sanitizeMessage($contactFormData['message']);

            $filename = 'SJHB btw aangifte.xls';

            if (isset($contactFormData['attachment'])) {
                $attachment = \Swift_Attachment::fromPath('../private/upload/tax/' . $filename)
                    ->setDisposition('inline')
                ;
                $message = (new \Swift_Message('SJHB'))
                    // ->setFrom($contactFormData['from'])
                    ->setTo($emailTo)
                    ->setFrom(['info@sjhomebakery.nl' => 'S J Home Bakery'])

                    ->setSubject($contactFormData['subject'])
                    ->attach($attachment)
                    ->setBody(
                        $this->renderView(
                            'email/email.html.twig',
                            ['contentMessage' => $contentMessage]
                        ),
                        'text/html'
                        )
                ;
            } else {
                $message = (new \Swift_Message('SJHB'))
                    ->setFrom(['info@sjhomebakery.nl' => 'S J Home Bakery'])
                    ->setTo($emailTo)
                    ->setSubject($contactFormData['subject'])
                    ->setBody(
                        $this->renderView(
                            'email/email.html.twig',
                            ['contentMessage' => $contentMessage]
                        ),
                        'text/html'
                        )
                ;
            }

            $this->addFlash('success', 'E-mail verzonden.');
            $mailer->send(
                $message
            );

            return $this->redirectToRoute('tax_index');
        }
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->showFlash('error', 'Verzenden mislukt, probeer het opnieuw.');
            // return new JsonResponse(['message' => (string) $form->getErrors(true, false)], 500);
        }

        // catch() {
        //     return $this->render('contact.html.twig', [
        //         'form' => $form->createView()
        //         ]);
        //     }

        return $this->render('email/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function sanitizeMessage($input)
    {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    public function sanitizeAdress($input)
    {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }
}
