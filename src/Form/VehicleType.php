<?php

namespace App\Form;

use App\Entity\Option;
use App\Entity\Type;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('capacity', null, ['label' => 'Capacity'])
            ->add('price', null, ['label' => 'Price'])
            ->add('numberPlate', null, ['label' => 'License Plate Number'])
            ->add('year', null, ['label' => 'Year'])
            ->add('numberKilometers', null, ['label' => 'Kilometers Count'])
            ->add('picturePath', null, ['label' => 'Picture Path'])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'name'
            ])
            ->add('options', EntityType::class, [
                'class' => Option::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class, ['label' => 'Submit'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
