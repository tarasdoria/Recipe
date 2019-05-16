<?php

declare(strict_types=1);


namespace App\Traits;


/**
 * Trait CreateDateTrait
 * @package App\Traits
 */
trait CreateDateTrait
{
    /** @var  */
    protected $createDate;

    /**
     *
     */
    protected function initCreateDateAwareTrait() : void{
        $this->createDate = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate(): \DateTime
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate(\DateTime $createDate): void
    {
        $this->createDate = $createDate;
    }
}