<?php

declare(strict_types=1);


namespace App\Factory;


use App\Entity\Recipe;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class RecipeFactory
 * @package App\Factory
 */
class RecipeFactory
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * RecipeFactory constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return Recipe
     */
    public function createNew() {
        $resource =  new Recipe();
        $resource->setAuthor($this->getUsername());

        return $resource;
    }

    /**
     * Get a user from the Security Token Storage.
     *
     * @return mixed
     *
     * @throws \LogicException If SecurityBundle is not available
     *
     * @see TokenInterface::getUser()
     *
     * @final
     */
    protected function getUsername(): ?string
    {
        if (null === $token = $this->tokenStorage->getToken()) {
            return null;
        }

        if (!\is_object($user = $token->getUser())) {
            return null;
        }

        return $token->getUsername();
    }


}