<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $builder->getData();

        $builder
            ->add('email', EmailType::class, array('label' => 'form.email',
             'attr' => ['placeholder' => 'naam@mail.nl'],
                'translation_domain' => 'FOSUserBundle'))
            
            ->add('username', null, array('label' => 'form.username',
                'translation_domain' => 'FOSUserBundle'))
            
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'placeholder' => 'false',
                'choices' => [
                    'Gebruiker' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN'
                            ],
                
            ])
        ;

        if ($user->getId() == null) {
            $builder
                ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'options' => array(
                        'translation_domain' => 'FOSUserBundle',
                        'attr' => array(
                            'autocomplete' => 'new-password',
                        ),
                    ),
                    'first_options' => array('label' => 'form.password',
                                            'attr' => ['placeholder' => 'Minimaal 10 karakters'
                                        ]),
                    'second_options' => array('label' => 'form.password_confirmation',
                                            'attr' => ['placeholder' => 'Minimaal 10 karakters'
                                        ]),
                    'invalid_message' => 'fos_user.password.mismatch',
                ))
            ;
        }
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
