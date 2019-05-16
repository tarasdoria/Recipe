<?php

declare(strict_types=1);


namespace App\Form\Type;


use App\Form\DataTransformer\StringToDateTimeTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RecipeSearchType
 * @package App\Form\Type
 */
class RecipeSearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false
            ])
            ->add('createDate', DateType::class, [
                    'attr'=>['class'=>'d-flex'],
                    'required' => false,
                ]
            )
            ->add('author', TextType::class, [
                'required' => false
            ])
            ->add('search', SubmitType::class, [
                'label' => 'app.grid.search'
            ]);

        $builder->get('createDate')->addModelTransformer(new StringToDateTimeTransformer());
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('csrf_protection', false);
    }
}