<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'trim' => true,
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'trim' => true,
            ])
            ->add('picture', TextType::class, [
                'label' => 'Photo',
                'trim' => true
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'trim' => true,
            ])
            ->add('mail', EmailType::class, [
                'label' => 'E-mail',
                'trim' => true,
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôle',
                'trim' => true,
                'choices' => User::ROLES,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Biographie',
                'trim' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
