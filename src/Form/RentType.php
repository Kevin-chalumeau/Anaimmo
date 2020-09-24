<?php

namespace App\Form;

use App\Entity\Rent;
use App\Entity\Option;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'titre'])
            ->add('city', TextType::class, ['label' => 'Ville'])
            ->add('monthPrice', IntegerType::class, ['label' => 'Loyers Mensuel TTC'])
            ->add('livingSpace', IntegerType::class, ['label' => 'Surface'])
            ->add('landSpace', IntegerType::class, ['label' => 'Surface extérieur'])
            ->add('rooms', IntegerType::class, ['label' => 'Nombre de chambre'])
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
