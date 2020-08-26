<?php

namespace App\Form;

use App\Entity\Sale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mandatNumber')
            ->add('type', TextType::class)
            ->add('annonceTitle', TextType::class)
            ->add('priceFAI')
            ->add('netSellerPrice')
            ->add('pourcentage')
            ->add('honorary')
            ->add('livingArea')
            ->add('landArea')
            ->add('descriptif', TextType::class)
            ->add('imageFile', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sale::class,
        ]);
    }
}
