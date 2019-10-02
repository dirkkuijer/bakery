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
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Message.Email'],
            ])
            ->add('username', null, ['label' => 'User.Username',
                'translation_domain' => 'FOSUserBundle', ])

            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'placeholder' => 'false',
                'choices' => [
                    'User.User' => 'ROLE_USER',
                    'User.Admin' => 'ROLE_ADMIN',
                ],
            ])
        ;

        if (null == $user->getId()) {
            $builder
                ->add('plainPassword', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'attr' => [
                        'autocomplete' => 'new-password',
                    ],
                    'first_options' => ['attr' => ['placeholder' => 'Message.Minimum characters']],

                    'second_options' => ['attr' => ['placeholder' => 'Message.Minimum characters']],
                    'invalid_message' => 'User.Mismatch',
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
