<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', ChoiceType::class, [
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'Kies een optie',
                'choices' => [
                    'Test' => 'dirkkuijer@hotmail.com',
                    'C. van Beijnum' => 'vanbeijnumadministratie@planet.nl', ],
            ])
            ->add('subject', ChoiceType::class, [
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'Kies een optie',
                'choices' => [
                    'Kwartaal BTW aangifte' => 'Kwartaal BTW aangifte',
                    'Persoonsgegevens' => 'Persoonsgegevens',
                    'Vraag' => 'Vraag',
                    'Anders' => 'Anders',
                ],
            ])
            ->add('attachment', FileType::class, [
                'required' => false,
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['placeholder' => 'Typ uw bericht'],
                'required' => 'required',
            ])
            ->add('send', SubmitType::class, [
                'attr' => [
                    'class' => 'button', ],
                'label' => 'Verzenden',
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
