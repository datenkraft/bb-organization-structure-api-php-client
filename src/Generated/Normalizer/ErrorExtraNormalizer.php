<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ErrorExtraNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorExtra';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorExtra';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorExtra();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('projectsError', $data)) {
            $values = array();
            foreach ($data['projectsError'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ProjectCustomerRelation', 'json', $context);
            }
            $object->setProjectsError($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getProjectsError()) {
            $values = array();
            foreach ($object->getProjectsError() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['projectsError'] = $values;
        }
        return $data;
    }
}