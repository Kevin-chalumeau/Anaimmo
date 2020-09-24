<?php

namespace App\Form;

use App\Entity\Sale;
use App\Entity\Option;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mandatNumber', IntegerType::class, ['label' => 'Numéro du mandat'])
            ->add('city', TextType::class, ['label' => 'ville'])
            ->add('type', TextType::class, ['label' => 'type du bien'])
            ->add('annonceTitle', TextType::class, ['label' => 'titre de l\'annonce'])
            ->add('priceFAI', IntegerType::class, ['label' => 'Prix TTC'])
            ->add('netSellerPrice', IntegerType::class, ['label' => 'Prix net vendeur'])
            ->add('pourcentage', IntegerType::class, ['label' => 'Pourcentage'])
            ->add('honorary', IntegerType::class, ['label' => 'Prix honoraire'])
            ->add('livingArea', IntegerType::class, ['label' => 'Surface de la maison'])
            ->add('landArea', IntegerType::class, ['label' => 'Superficie du terrain'])
            ->add('descriptif', TextareaType::class, ['label' => 'Description du bien'])
            ->add('options', EntityType::class, [
                'class' => Option::class,
                'required' => false,
                'choice_label' => 'name',
                'multiple' => true
                ])
            ->add('pictureFiles', FileType::class, [
                'required' => false,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sale::class,
        ]);
    }
}
