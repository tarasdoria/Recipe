<?php

declare(strict_types=1);


namespace App\UserBundle\Model;

use App\Model\ResourceInterface;
use FOS\UserBundle\Model\FosUserInterface;

/**
 * Interface UserInterface
 * @package App\UserBundle\Model
 */
interface UserInterface extends
    FosUserInterface,
    ResourceInterface
{

}