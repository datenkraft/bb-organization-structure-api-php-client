<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    protected $normalizers = array('Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\ErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Error' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\ErrorNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Customer' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\CustomerNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\NewCustomer' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\NewCustomerNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Organization' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\OrganizationNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Project' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\ProjectNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\NewProject' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\NewProjectNormalizer', '\\Jane\\JsonSchemaRuntime\\Reference' => '\\Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null)
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}