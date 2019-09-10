<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class TaxType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
            ])->add('endDate', DateType::class, [
                'widget' => 'single_text',
            ])->add('Kwartaal', ChoiceType::class, [
                'choices' => ['1' => '1', '2' => '2', '3' => '3', '4' => '4'],
                'expanded' => true,
                'multiple' => false,
            ]);
    }
}
