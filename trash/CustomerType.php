<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('street')
            ->add('houseNumber')
            ->add('postalCode')
            ->add('city')
            ->add('telephone', TextType::class, [
                'attr' => ['placeholder' => '123-4567890'],
            ])
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'naam@mail.nl'],
            ])
            ->add('allergies')
            ->add('bankaccountNumber')
            ->add('kindOfInvoiceCustomer', ChoiceType::class, [
                'choices' => [ 'Klant' => true, 'Leverancier' => false ],
                'expanded' => true,
                'multiple' => false
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Customer',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_customer';
    }
}
