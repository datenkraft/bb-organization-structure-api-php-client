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
    protected $normalizers = array('Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\ErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Error' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\ErrorNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\DeleteCustomerConflictErrorResponse' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\DeleteCustomerConflictErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\DeleteCustomerConflictError' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\DeleteCustomerConflictErrorNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\DeleteCustomerConflictErrorextra' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\DeleteCustomerConflictErrorextraNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\IdentityConflictErrorResponse' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\IdentityConflictErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\IdentityConflictError' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\IdentityConflictErrorNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\IdentityConflictErrorextra' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\IdentityConflictErrorextraNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\DeleteProjectConflictErrorResponse' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\DeleteProjectConflictErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\DeleteProjectConflictError' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\DeleteProjectConflictErrorNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\DeleteProjectConflictErrorextra' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\DeleteProjectConflictErrorextraNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\PostProjectSkuCollectionConflictErrorResponse' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\PostProjectSkuCollectionConflictErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\PostProjectSkuCollectionConflictError' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\PostProjectSkuCollectionConflictErrorNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\PostProjectSkuCollectionConflictErrorextra' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\PostProjectSkuCollectionConflictErrorextraNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\AuthPermissionResource' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\AuthPermissionResourceNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\AuthRoleResource' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\AuthRoleResourceNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\AuthRoleIdentityResource' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\AuthRoleIdentityResourceNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Customer' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\CustomerNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\NewCustomer' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\NewCustomerNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Identity' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\IdentityNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\NewIdentity' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\NewIdentityNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\IdentityProject' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\IdentityProjectNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Organization' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\OrganizationNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\Project' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\ProjectNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\NewProject' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\NewProjectNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ProjectSku' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\ProjectSkuNormalizer', 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\NewProjectSku' => 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Normalizer\\NewProjectSkuNormalizer', '\\Jane\\JsonSchemaRuntime\\Reference' => '\\Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
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