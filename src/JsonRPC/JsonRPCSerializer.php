<?php

namespace Softwarewisdom\Diem\JsonRPC;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

trait JsonRPCSerializer
{
    public function serializer(): SerializerInterface
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(
            new AnnotationReader()
        ));

        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter)];

        return new Serializer($normalizers, $encoders);
    }
}
