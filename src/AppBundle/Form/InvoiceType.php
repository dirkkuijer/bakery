<?php

namespace AppBundle\Form;

use AppBundle\Entity\Invoice;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $invoice = new Invoice();
        $year = date('y');

        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('invoiceNumber')
            ->add('description', TextareaType::class, [
                'attr' => ['placeholder' => 'Omschrijving bestelling'],
            ])
            ->add('amount')
            ->add('amountWithVat')
            ->add('vatAmount')
            ->add('vatPercentage')
            ->add('relation', EntityType::class, [
                'class' => 'AppBundle:Relation',
                'choice_label' => 'name',
                'label' => 'Name',
            ])
            ->add('invoiceSend', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('statusPayment', ChoiceType::class, [
                'choices' => ['Betaald' => true, 'Niet betaald' => false],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Opslaan',
                'attr' => ['class' => 'button'],
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
