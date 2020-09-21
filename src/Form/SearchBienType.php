<?php

namespace App\Form;

use App\Model\SearchBien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchBienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, ['label' => 'Prénom : '])
            ->add('lastname', TextType::class, ['label' => 'Nom : '])
            ->add('email', EmailType::class)
            ->add('phone', TextType::class, ['label' => 'Téléphone : '])
            ->add('type', TextType::class, ['label' => 'Entrée le type de bien (maison, appartement,.... :'])
            ->add('budget', TextType::class, ['label' => 'Saisissez votre budget maximal : '])
            ->add('localisation', TextType::class, ['label' => 'Entrée des villes :'])
            ->add('rooms', TextType::class, ['label' => 'Nombre de chambre souhaité :'])
            ->add('livingSpace', TextType::class, ['label' => 'Surface habitable maximum : '])
            ->add('landSpace', TextType::class, ['label' => 'Surface du terrain maximum : '])
            ->add('message', TextareaType::class, ['label' => 'Vous pouvez ajouter d\'autre information :'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
