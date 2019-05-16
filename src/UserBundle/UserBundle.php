<?php

declare(strict_types=1);

namespace App\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class UserBundle
 * @package App\UserBundle
 */
class UserBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}