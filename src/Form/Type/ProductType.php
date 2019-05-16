<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Ingredient;
use App\Entity\Product;
use App\Entity\Storage;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ProductType
 * @package App\Form\Type
 */
class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', CkeditorType::class)
            ->add('perempdate', DateType::class)
            ->add('quantity', IntegerType::class)
            ->add('price', IntegerType::class)
            ->add('ingredient', EntityType::class, [
                'class' => Ingredient::class,
                'choice_label' => 'name',
                'multiple' => false,
            ])
            ->add('storages', EntityType::class, [
                'class' => Storage::class,
                'choice_label' => 'name',
                'multiple' => true,
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
            'data_class' => Product::class
        ]);
    }
}
