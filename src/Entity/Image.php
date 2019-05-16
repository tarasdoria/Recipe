<?php

declare(strict_types=1);


namespace App\Entity;

use App\Model\ImageInterface;
use App\Traits\NamingTrait;
use App\Traits\ResourceTrait;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class Image
 * @package App\Entity
 */
class Image implements ImageInterface
{
    use ResourceTrait,
        NamingTrait;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * @var string|null
     */
    protected $alt;

    /**
     * @var File|null
     */
    protected $file;

    /**
     * @var string|null
     */
    protected $tempFileName;

    /**
     * Image constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * @param string $alt
     */
    public function setAlt($alt) : void
    {
        $this->alt = $alt;
    }

    /**
     * @return string
     */
    public function getAlt() : ?string
    {
        return $this->alt;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param mixed $file
     */
    public function setFile(File $file = null): void
    {
        $this->file = $file;

        if(null !== $this->url){

            $this->url = null;
            $this->alt = null;
        }
    }

    /**
     *
     */
    public function preUpload()
    {
        if(null === $this->file){
            return;
        }

        $this->url = $this->file->guessExtension();
        $this->alt = $this->file->getFileName();
        $this->name = md5(strval($this->alt)).'.'.$this->url;
    }

    /**
     *
     */
    public function upload()
    {
        if(null === $this->file) {
            return;
        }

        if (!null == $this->name){
            $oldFile = $this->getUploadRootDir().'/'.$this->name;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $this->file->move(
            $this->getUploadRootDir(),
            $this->name
        );
    }

    /**
     *
     */
    public function preRemoveUpload()
    {
        $this->tempFileName = $this->getUploadRootDir().'/'.$this->name;
    }

    /**
     *
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFileName)) {
            unlink($this->tempFileName);
        }
    }

    /**
     * @return string|null
     */
    public function getUploadDir(): ?string
    {
        return 'uploads/img';
    }

    /**
     * @return string|null
     */
    public function getUploadRootDir(): ?string
    {
        return __DIR__.'/../../public/'.$this->getUploadDir();
    }

    /**
     * @return string|null
     */
    public function getWebPath(): ?string
    {
        return $this->getUploadDir().'/'.$this->getName();
    }

    /**
     * @param string|null $tempFileName
     */
    public function setTempFileName(?string $tempFileName): void
    {
        $this->tempFileName = $tempFileName;
    }

    /**
     * @return string|null
     */
    public function getTempFileName(): ?string
    {
        return $this->tempFileName;
    }



}