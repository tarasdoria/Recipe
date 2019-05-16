<?php

declare(strict_types=1);


namespace App\Model\Aware;

/**
 * Interface CreateDateAwareInterface
 * @package App\Model\Aware
 */
interface CreateDateAwareInterface
{
    /**
     * @return \DateTime
     */
    public function getCreateDate(): \DateTime;

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate(\DateTime $createDate): void;
}