<?php

declare(strict_types=1);


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CkeditorType
 * @package App\Form\Type
 */
class CkeditorType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => ['class' =>'ckeditor']
        ]);
    }

    public function getParent()
    {
        return TextareaType::class;
    }
}