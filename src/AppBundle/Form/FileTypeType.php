<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class FileTypeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filename', FileType::class, [
                'label' => 'Factuur (PDF)',
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '1224k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Alleen geldige PDF-bestanden uploaden.',
                    ]),
                ],
            ])
            ->add('period', ChoiceType::class, [
                'choices' => [1 => 1, 2 => 2, 3 => 3, 4 => 4],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add(
                'date',
                DateType::class,
                [
                    'widget' => 'single_text',
                    'required' => false,
                ]
            )
            // ->add(
            //     'save',
            //     SubmitType::class,
            //     [
            //         'label' => 'Opslaan',
            //         'attr' => ['class' => 'button'],
            //     ]
            // )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\File',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_file';
    }
}
