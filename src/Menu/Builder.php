<?php

declare(strict_types=1);

namespace App\Menu;

use App\Entity\Recipe;
use App\Model\RecipeInterface;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class Builder
 * @package App\Menu
 */
class Builder
{
    /**
     * @var FactoryInterface
     */
    protected $factory;
    /**
     * @var Router
     */
    protected $router;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * Builder constructor.
     *
     * @param FactoryInterface       $factory
     * @param Router                 $router
     * @param TranslatorInterface    $translator
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        FactoryInterface $factory,
        Router $router,
        TranslatorInterface $translator,
        EntityManagerInterface $entityManager
    )
    {
        $this->factory       = $factory;
        $this->router        = $router;
        $this->translator    = $translator;
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $options
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function navMenu(array $options)
    {
        $menu = $this->factory->createItem('root')->setChildrenAttribute('class', 'navbar-nav');

        $menu->addChild($this->translator->trans('recipe.nav.home', [], 'index'), [
            'route' => 'app_recipe_index',
        ])->setAttribute('class', 'nav-item')
            ->setLinkAttribute('class', 'nav-link');
        $menu->addChild($this->translator->trans('recipe.nav.add', [], 'index'), [
            'route' => 'app_recipe_add',
        ])->setAttribute('class', 'nav-item')
            ->setLinkAttribute('class', 'nav-link');
//        $menu->addChild($this->translator->trans('recipe.nav.edit', [], 'index'), [
//            'route' => 'app_recipe_edit',
//        ])->setAttribute('class', 'nav-item')
//            ->setLinkAttribute('class', 'nav-link');
//        $menu->addChild($this->translator->trans('recipe.nav.delete', [], 'index'), [
//            'route' => 'app_recipe_delete',
//        ])->setAttribute('class', 'nav-item')
//            ->setLinkAttribute('class', 'nav-link');

        return $menu;
    }

    public function adminMenu(array $option)
    {
        $menu = $this->factory->createItem('root')->setChildrenAttribute('class', 'navbar-nav');

        $menu->addChild($this->translator->trans('app.navbar.recipe'), [
            'route' => 'app_recipe_index',
        ])->setAttribute('class', 'nav-item')
        ->setLinkAttribute('class', 'nav-link');
        $menu->addChild($this->translator->trans('app.navbar.ingredient'), [
            'route' => 'app_ingredient_index',
        ])->setAttribute('class', 'nav-item')
            ->setLinkAttribute('class', 'nav-link');
        $menu->addChild($this->translator->trans('app.navbar.product'), [
            'route' => 'app_product_index',
        ])->setAttribute('class', 'nav-item')
            ->setLinkAttribute('class', 'nav-link');
        $menu->addChild($this->translator->trans('app.navbar.storage'), [
            'route' => 'app_storage_index',
        ])->setAttribute('class', 'nav-item')
            ->setLinkAttribute('class', 'nav-link');
        $menu->addChild($this->translator->trans('app.navbar.user'), [
            'route' => 'app_user_index',
        ])->setAttribute('class', 'nav-item')
            ->setLinkAttribute('class', 'nav-link');

        return $menu;
    }

    /**
     * @param array $option
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function lastRecipeMenu(array $option)
    {
        $menu        = $this->factory->createItem('root')->setChildrenAttribute('class', 'nav flex-column');
        $limit       = $option['limit'] ?? 10;
        $listRecipes = $this->entityManager->getRepository(Recipe::class)->getLastRecipes($limit);
        /** @var RecipeInterface $recipe */
        foreach ($listRecipes as $recipe) {
            $recipeMenu = $menu->addChild($recipe->getSlug(), [
                'label'           => $recipe->getName(),
                'route'           => 'app_recipe_view',
                'routeParameters' => [
                    'slug' => $recipe->getSlug(),
                ]
            ])->setAttribute('class', 'nav-item')
                ->setLinkAttribute('class', 'nav-link');
        }

        return $menu;
    }
}