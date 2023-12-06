<?php

namespace App\Form;

use App\Entity\Readable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Novel' => 'novel',
                    'Manhwa' => 'manhwa',
                    'Manga' => 'manga',
                ],
                'attr' => [
                    'class' => 'form-field form-control',
                ],
            ])
            ->add('title', TextType::class,
                [
                    'attr' => [
                        'class' => 'form-field form-control',
                    ],
                ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'rows' => '3',
                    'class' => 'form-field form-control',
                ],
            ])
            ->add('author', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-field form-control',
                ],
            ])
            ->add('daysOfWeek', ChoiceType::class, [
                'label' => 'Coming out days',
                'choices' => [
                    'Monday' => 'monday',
                    'Tuesday' => 'tuesday',
                    'Wednesday' => 'wednesday',
                    'Thursday' => 'thursday',
                    'Friday' => 'friday',
                    'Saturday' => 'saturday',
                    'Sunday' => 'sunday',
                ],
                'multiple' => true,
                'expanded' => true,
                'required' => true,
                'attr' => [
                    'class' => 'days-of-week-checkboxes',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Readable::class,
        ]);
    }
}
