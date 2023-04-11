<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Your name'],
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 5])
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Your email address'],
                'constraints' => [
                    new NotBlank(),
                    new Email(),
                ]
            ])
            ->add('subject', TextType::class, [
                'attr' => ['placeholder' => 'The subject of your message'],
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 10]),
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Enter your message...',
                    'rows' => 5
                ],
                'constraints' => [
                    new NotBlank(),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
