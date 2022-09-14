<?php

namespace App\Form;

use App\Entity\Seances;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeancesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idm', IntegerType::class, array("label" =>"id adhéren"))
        ->add('ida', IntegerType::class, array("label" =>"id moniteur"))
        ->add('date', BirthdayType::class,["widget" => "single_text"])
        ->add('heure', TextType::class)
        ->add('nbheure', IntegerType::class, array("label" =>"nombre d'heure"))
        ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Seances::class,
        ]);
    }
}
