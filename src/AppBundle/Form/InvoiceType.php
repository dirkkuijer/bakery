<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('invoiceNumber', TextType::class, [
                'attr' => ['placeholder' => 'jaartal-opvolgnummer'],
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['placeholder' => 'Omschrijving bestelling'],
            ])
            ->add('amount')
            ->add('amountWithVat')
            ->add('vatAmount')
            ->add('vatPercentage')
            ->add('customer', EntityType::class, [
                'class' => 'AppBundle:Customer',
                'choice_label' => 'fullName',
                'label' => 'fullName',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Invoice',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_invoice';
    }
}
