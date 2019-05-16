<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Recipe;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RecipeType
 * @package App\Form\Type
 */
class RecipeType extends AbstractType
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
            ->add('description', CkeditorType::class)
            ->add('prep_time', IntegerType::class)
            ->add('cook_time', IntegerType::class)
            ->add('cal', IntegerType::class)
            ->add('nb_part', IntegerType::class)
            ->add('ingredientsQuantity', CollectionType::class, [
                'label' => 'app.form.recipe.add.ingredients',
                'entry_type' => IngredientQuantityType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' =>false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'app.form.save'
            ])
            ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class
        ]);
    }
}