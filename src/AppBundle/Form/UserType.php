<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $builder->getData();

        $builder
            ->add('email', EmailType::class, ['label' => 'form.email',
                'attr' => ['placeholder' => 'naam@mail.nl'],
                'attr' => ['minlength' => 10],
                'translation_domain' => 'FOSUserBundle', ])

            ->add('username', null, ['label' => 'form.username',
                'translation_domain' => 'FOSUserBundle', ])

            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'placeholder' => 'false',
                'choices' => [
                    'Gebruiker' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                ],
            ])
        ;

        if (null == $user->getId()) {
            $builder
                ->add('plainPassword', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'options' => [
                        'translation_domain' => 'FOSUserBundle',
                        'attr' => [
                            'autocomplete' => 'new-password',
                        ],
                    ],
                    'first_options' => ['label' => 'form.password',
                        'attr' => ['placeholder' => 'Minimaal 10 karakters',
                        ], ],
                    'second_options' => ['label' => 'form.password_confirmation',
                        'attr' => ['placeholder' => 'Minimaal 10 karakters',
                        ], ],
                    'invalid_message' => 'fos_user.password.mismatch',
                ])
            ;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\User',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }
}
