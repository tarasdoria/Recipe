<?php
// src/Controller/RecipeController.php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Recipe;
use App\Factory\RecipeFactory;
use App\Form\Type\RecipeSearchType;
use App\Form\Type\RecipeType;
use App\Model\ResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RecipeController
 * @package App\Controller
 */
class RecipeController extends ResourceController
{
    /**
     * @return string
     */
    protected function getEntityClass(): string
    {
        return Recipe::class;
    }

    /**
     * @return string
     */
    protected function getFormFilter(): string
    {
        return RecipeSearchType::class;
    }

    /**
     * @return string
     */
    protected function getFormType(): string
    {
        return RecipeType::class;
    }

    /**
     * @param Recipe  $recipe
     * @param Request $request
     *
     * @return Response
     */
    public function editWithSlugAction(Recipe $recipe, Request $request): Response
    {
        return $this->editAction($recipe->getId(), $request);
    }

    /**
     * @param Recipe  $recipe
     * @param Request $request
     *
     * @return Response
     */
    public function deleteWithSlugAction(Recipe $recipe, Request $request): Response
    {
        return $this->deleteAction($recipe->getId(), $request);
    }

    /**
     * @return ResourceInterface
     */
    protected function newResource(): ResourceInterface {
        $factory  = $this->get(RecipeFactory::class);

        return $factory->createNew();
    }
}