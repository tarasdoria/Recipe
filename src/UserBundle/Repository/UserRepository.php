<?php

declare(strict_types=1);

namespace App\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;
use App\UserBundle\Repository\Model\UserRepositoryInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;

/**
 * Class UserRepository
 * @package App\UserBundle\Repository
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * @param array         $params
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $params, FormInterface $form)
    {
        $qb = $this->createQueryBuilder('u');

        foreach ($params as $field => $value){
            $innerType = get_class($form->get($field)->getConfig()->getType()->getInnerType());
            if (in_array($innerType, [TextType::class])) {
                $qb->orWhere('u.' . $field . ' LIKE :' . $field)
                    ->setParameter($field, '%' . $value . '%');
            }
        }

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
}