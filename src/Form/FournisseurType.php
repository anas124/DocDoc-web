<?php

namespace App\Form;

use App\Entity\FourniseurService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fourniseur')
            ->add('contact')
            ->add('numero')
            ->add('gouvernorat')
            ->add('delegation')
            ->add('maplocation')
            ->add('categorie')
            ->add('service')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FourniseurService::class,
        ]);
    }
}
