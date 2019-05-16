<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\NamingAwareInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Interface ImageInterface
 * @package App\Model
 */
interface ImageInterface extends
    ResourceInterface,
    NamingAwareInterface
{

    /**
     * @param string|null $alt
     */
    public function setAlt($alt):void;

    /**
     * @return string|null
     */
    public function getAlt() : ?string;

    /**
     * @return mixed|null
     */
    public function getFile();

    /**
     * @param mixed|null $file
     */
    public function setFile(File $file = null): void;

    /**
     * @return string|null
     */
    public function getUrl(): ?string;

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void;

    /**
     *
     */
    public function preUpload();

    /**
     *
     */
    public function upload();

    /**
     *
     */
    public function preRemoveUpload();

    /**
     *
     */
    public function removeUpload();

    /**
     * @return string|null
     */
    public function getUploadDir(): ?string;

    /**
     * @return string|null
     */
    public function getUploadRootDir(): ?string;

    /**
     * @return string|null
     */
    public function getWebPath(): ?string;
    /**
     * @param string|null $tempFileName
     */
    public function setTempFileName(?string $tempFileName): void;

    /**
     * @return string|null
     */
    public function getTempFileName(): ?string;

}