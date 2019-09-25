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
                        '<html>
                        <body>
                        <h3 style="background-color:purple;
                        color:white;
                        text-align:center;
                        padding:3px;
                        box-shadow:1px1px1pxblack;">
                        S J Home Bakery
                        </h3>
                        <p>
                        <i>' . $contentMessage . '</i>
                        </p>
                        
                        Met vriendelijke groeten,<br><br>
                        <br>
                        Silvija Ilic
                        </body>
                        </html>',
                        'text/html'
                        )
                        // ->setReplyTo(['silvija_ilic@hotmail.com' => 'S J Home Bakery'])
                        // ->addBcc('silvija_ilic@hotmail.com')
                ;
            } else {
                $message = (new \Swift_Message('SJHB'))
                    ->setFrom(['info@sjhomebakery.nl' => 'S J Home Bakery'])
                    ->setTo($emailTo)
                    ->setSubject($contactFormData['subject'])
                    ->setBody(
                        '<html>
                        <body>
                        <h3 style="background-color:purple;
                        color:white;
                        text-align:center;
                        padding:3px;
                        box-shadow:1px1px1pxblack;">
                        S J Home Bakery
                        </h3>
                        <p>
                        <i>' . $contactFormData['message'] . '</i>
                        </p>
                        
                        Met vriendelijke groeten,<br><br>
                        <br>
                        Silvija Ilic
                        </body>
                        </html>',
                        'text/html'
                        )
                    // ->setReplyTo(['silvija_ilic@hotmail.com' => 'S J Home Bakery'])
                        ;
            }

            echo '<div class="flash-succes">E-mail is verzonden.</div>';
            $mailer->send(
                $message
            );

            // $route = 'contact

            // return new JsonResponse(['redirectToRoute' => $this->generateUrl($route)], 200);

            // return $this->render('tax/index.html.twig', [
            //     'form' => $form->createView(),
            // ]);
            // $route = 'tax_index';

            // return new JsonResponse(['redirectToRoute' => $this->generateUrl($route, ['type' => $contactType])], 200);
            return $this->redirectToRoute('tax_index');
        }
        if ($form->isSubmitted() && !$form->isValid()) {
            // echo '<div class="flash-error">Er is een fout opgetreden.</div>';
            // return new JsonResponse(['message' => (string) $form->getErrors(true, false)], 500);
        }

        // catch() {
        //     return $this->render('contact.html.twig', [
        //         'form' => $form->createView()
        //         ]);
        //     }

        return $this->render('contact.html.twig', [
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
