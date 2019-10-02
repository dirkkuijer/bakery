<?php

namespace AppBundle\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('attachment', FileType::class, [
                'required' => false,
            ])
            ->add('to', EmailType::class, [
                'attr' => ['placeholder' => 'Message.Email',
                    'list' => 'contacts', ],
            ])
            // ->add('from', EmailType::class,[
            //     'attr' => ['placeholder' => 'naam@email.nl']
            // ])
            ->add('subject', ChoiceType::class, [
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'Contact.Option subject',
                'choices' => [
                    'Contact.Send tax' => 'Contact.Send tax',
                    'Contact.Person information' => 'Contact.Person information',
                    'Contact.Question' => 'Contact.Question',
                    'Contact.Other' => 'Contact.Other',
                ],
            ])
            // ->add('send', SubmitType::class, [
            //     'label' => 'Verzenden',
            //     'attr' => ['class' => 'button'],
            // ])
            ->add('message', TextareaType::class, [
                'attr' => ['placeholder' => 'Message.Type your message',
                    'rows' => '4', ],
                'required' => 'required',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Contact::class,
        ]);
    }
}
