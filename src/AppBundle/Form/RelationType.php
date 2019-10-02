<?php

namespace AppBundle\Form;

use AppBundle\Entity\Relation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RelationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $relation = new Relation();
        $builder
            ->add('kindOfRelation', ChoiceType::class, [
                'choices' => ['Relation.Customer' => true, 'Relation.Supplier' => false],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Message.Name'],
            ])
            ->add('street')
            ->add('houseNumber', TextType::class, [
                'attr' => ['placeholder' => 'Message.Addition house'],
                'required' => false,
            ])
            ->add('postalCode', TextType::class, [
                'required' => false,
            ])
            ->add('city')
            ->add('telephone', TextType::class, [
                'required' => false,
            ])
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Message.Email'],
            ])
            ->add('allergies', TextareaType::class, [
                'required' => false,
            ])
            ->add('bankAccountNumber', TextType::class, [
                'required' => false,
            ])
            ->add('extraInfo', TextareaType::class, [
                'required' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Relation',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_relation';
    }
}
