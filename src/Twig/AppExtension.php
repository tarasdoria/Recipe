<?php

declare(strict_types=1);

namespace App\Twig;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
/**
 * Class AntispamExtension
 * @package App\Twig
 */
class AppExtension extends AbstractExtension
{

    /**
     * @return array|TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('getPagerAdapter', [$this, 'pager'])
        ];
    }

    /**
     * @param array $enities
     * @param int   $page
     *
     * @return Pagerfanta
     */
    public function pager(array $enities, $page = 1) {
        $adapter    = new ArrayAdapter($enities);
        $pagerfanta = new Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage(10);

        if ($pagerfanta->getNbPages() >= (int)$page) {
            $pagerfanta->setCurrentPage($page);
        }

        return $pagerfanta;
    }

}