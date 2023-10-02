<?php

namespace App\Form;

use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchVehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateStart', DateType::class, [
                'label' => "Date de début",
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('dateEnd', DateType::class, [
                'label' => "Date de fin",
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'name',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Chercher',
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
