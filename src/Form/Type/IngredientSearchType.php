<?php

declare(strict_types=1);


namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class IngredientSearchType
 * @package App\Form\Type
 */
class IngredientSearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false
            ])
            ->add('cal', IntegerType::class, [
                    'required' => false,
                ]
            )
            ->add('type', ChoiceType::class, [
                'choices' => \App\DBAL\Types\IngredientType::getChoices(),
                'multiple' => false,
                'data' => 2
            ])
            ->add('search', SubmitType::class, [
                'label' => 'app.grid.search'
            ]);
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('csrf_protection', false);
    }
}