<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class IngredientType
 * @package App\Form\Type
 */
class IngredientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'app.form.recipe.name'
            ])
            ->add('image',    ImageType::class)
            ->add('cal', IntegerType::class)
            ->add('type', ChoiceType::class, [
                'choices' => \App\DBAL\Types\IngredientType::getChoices(),
                'multiple' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'app.form.save'
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class
        ]);
    }
}