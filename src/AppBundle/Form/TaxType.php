<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class TaxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank(), ],
            ])
            ->add('till', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank(), ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Opslaan',
                'attr' => ['class' => 'button'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Tax::class,
        ]);
    }
}
