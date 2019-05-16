<?php

declare(strict_types=1);


namespace App\Serializer;

use App\Model\ResourceInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/*
 *
 */
class SerializerFactory
{
    private $path;
    /**
     * SerializerFactory constructor.
     *
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }
    /**
     *
     * @return ObjectNormalizer
     */
    protected function getNormalizer() : ObjectNormalizer
    {
        $classMetadataFactory = new ClassMetadataFactory(
            new YamlFileLoader($this->path)
        );
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function (ResourceInterface $object, $format, $context) {
                return $object->getId();
            },
        ];
        $normalizer = new ObjectNormalizer($classMetadataFactory, null, null, null, null, null, $defaultContext);
        $callback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };
        $callbackDesc = function ($desc) {
            return htmlspecialchars($desc);
        };
        $normalizer->setCallbacks([
            'createDate' => $callback,
            'perempDate' => $callback,
            'description' => $callbackDesc
        ]);

        return $normalizer;
    }
    /**
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return new Serializer([$this->getNormalizer()], [new JsonEncoder()]);
    }
}