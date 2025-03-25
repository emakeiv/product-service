<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('costPrice', NumberType::class, [
                'html5' => true,
                'scale' => 2,
                'attr' => [
                    'step' => '0.01',
                    'min' => '0',
                    'class' => 'form-control'
                ]
            ])
            ->add('sellPrice', NumberType::class, [
                'html5' => true,
                'scale' => 2,
                'attr' => [
                    'step' => '0.01',
                    'min' => '0',
                    'class' => 'form-control'
                ]
            ])
            ->add('sku')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
