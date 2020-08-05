<?php

namespace App\Form;

use App\Entity\Sale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mandatNumber')
            ->add('type')
            ->add('annonceTitle')
            ->add('priceFAI')
            ->add('netSellerPrice')
            ->add('pourcentage')
            ->add('honorary')
            ->add('livingArea')
            ->add('landArea')
            ->add('descriptif')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sale::class,
        ]);
    }
}
