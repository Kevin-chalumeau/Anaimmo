<?php

namespace App\Form;

use App\Entity\Rent;
use App\Entity\Option;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('city')
            ->add('monthPrice')
            ->add('livingSpace')
            ->add('landSpace')
            ->add('rooms')
            ->add('meuble')
            ->add('notMeuble')
            ->add('dpe')
            ->add('description')
            ->add('options', EntityType::class, [
                'class' => Option::class,
                'required' => false,
                'choice_label' => 'name',
                'multiple' => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rent::class,
        ]);
    }
}
