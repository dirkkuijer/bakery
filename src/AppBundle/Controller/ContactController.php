<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $message = (new \Swift_Message('SJHB'))
                ->setFrom($contactFormData['name'])
                ->setTo($contactFormData['email'])
                ->setSubject($contactFormData['subject'])
                ->attach($contactFormData['attachment'])
                ->setBody(
                    $contactFormData['message'],
                    'text/plain'
               )
                ->setReplyTo($contactFormData['email'])
                ->addBcc($contactFormData['email'])
           ;

            $mailer->send($message);

            echo '<div class="flash-succes">Bericht is verzonden.</div>';

            return $this->render('tax/index.html.twig', [
                'form' => $form->createView(),
            ]);
        }

        return $this->render('contact.html.twig', [
            'form' => $form->createView(),
        ]);
        $state = 'Probeer het opnieuw! Verzenden mislukt.';
        $this->showFlash($state);
    }

    // added by Dirk to show flash messages after submitting form
    public function showFlash(String $state)
    {
        return $this->addFlash('success', $state);
    }
}
