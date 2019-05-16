<?php

declare(strict_types=1);


namespace App\Controller;


use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ShopController
 * @package App\Controller
 */
class ShopController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('index.html.twig', [
        ]);
    }

    /**
     * @return Response
     */
    public function getRecipesAction(): Response
    {
        $serializer = $this->get('app.serializer.context.recipe');
        $serializer->setContext('recipe_id');

        return new Response($this->get('app.serializer.context.recipe')->findRootNodes());
    }


    /**
     * @param $id
     *
     * @return Response
     */
    public function getRecipeAction($id): Response
    {
        return new Response($this->get('app.serializer.context.recipe')->findRootNodeId($id));
    }
}