<?php

declare(strict_types=1);


namespace App\Helper;

use App\Entity\Recipe;
use App\Repository\Model\RecipeRepositoryInterface;
use App\Serializer\SerializerFactory;
use Doctrine\ORM\EntityManagerInterface;

class SerializationContextHelper
{
    /**
     * @var RecipeRepositoryInterface
     */
    private $recipeRepository;
    /**
     * @var SerializerFactory
     */
    private $serializerFactory;
    /**
     * @var string
     */
    private $context;

    /**
     * SerializationContextHelper constructor.
     *
     * @param SerializerFactory      $serializerFactory
     * @param EntityManagerInterface $em
     * @param string                 $context
     */
    public function __construct(
        SerializerFactory $serializerFactory,
        EntityManagerInterface $em,
        string $context
    )
    {
        $this->recipeRepository   = $em->getRepository(Recipe::class);
        $this->serializerFactory = $serializerFactory;
        $this->context           = $context;
    }
    /**
     * @param $id
     *
     * @return string
     */
    public function findRootNodes()
    {
        $serializer = $this->serializerFactory->getSerializer();
        $nodes      = $this->recipeRepository->findAll();
        return $serializer->serialize($nodes, 'json', ['groups' => [$this->context]]);
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function findRootNodeId($id)
    {
        $serializer = $this->serializerFactory->getSerializer();
        $node      = $this->recipeRepository->find($id);
        return $serializer->serialize($node, 'json', ['groups' => [$this->context]]);
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }
}