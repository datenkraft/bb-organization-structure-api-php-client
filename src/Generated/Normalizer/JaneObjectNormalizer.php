<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Normalizer\CheckArray;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Normalizer\ValidatorTrait;
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
    use ValidatorTrait;
    protected $normalizers = [
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuditLog::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuditLogNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuditLogCollection::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuditLogCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthPermissionResource::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuthPermissionResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthPermissionRolePaginatedCollection::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuthPermissionRolePaginatedCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthPermissionRoleResource::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuthPermissionRoleResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleCollection::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuthRoleCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityPaginatedCollection::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuthRoleIdentityPaginatedCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityResource::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuthRoleIdentityResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleResource::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\AuthRoleResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\BaseCustomer::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\BaseCustomerNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\BaseIdentity::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\BaseIdentityNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\BaseProject::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\BaseProjectNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Collection::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\CollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\CollectionPagination::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\CollectionPaginationNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Customer::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\CustomerNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictError::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\DeleteCustomerConflictErrorNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorExtra::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\DeleteCustomerConflictErrorExtraNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\DeleteCustomerConflictErrorResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictError::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\DeleteProjectConflictErrorNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorExtra::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\DeleteProjectConflictErrorExtraNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\DeleteProjectConflictErrorResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Error::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\ErrorNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorReferencesItem::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\ErrorReferencesItemNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\ErrorResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetAuthPermissionCollectionResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\GetAuthPermissionCollectionResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetCustomerCollectionResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\GetCustomerCollectionResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetIdentityCollectionResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\GetIdentityCollectionResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetIdentityProjectCollectionResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\GetIdentityProjectCollectionResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetOrganizationCollectionResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\GetOrganizationCollectionResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetProjectCollectionResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\GetProjectCollectionResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Identity::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\IdentityNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityProject::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\IdentityProjectNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Information::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\InformationNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\InformationResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\InformationResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewAuthRoleResource::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\NewAuthRoleResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\NewCustomerNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\NewIdentityNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\NewProjectNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProjectSku::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\NewProjectSkuNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Organization::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\OrganizationNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PatchCustomer::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\PatchCustomerNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PatchIdentity::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\PatchIdentityNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PatchProject::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\PatchProjectNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictError::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\PostProjectSkuCollectionConflictErrorNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorExtra::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\PostProjectSkuCollectionConflictErrorExtraNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\PostProjectSkuCollectionConflictErrorResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\ProjectNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ProjectSku::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\ProjectSkuNormalizer::class,
        
        \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ProjectSkuCollection::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\ProjectSkuCollectionNormalizer::class,
        
        \Jane\Component\JsonSchemaRuntime\Reference::class => \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Normalizer\ReferenceNormalizer::class,
    ], $normalizersCache = [];
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[get_class($data)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($data, $format, $context);
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $type, $format, $context);
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
    public function getSupportedTypes(?string $format = null): array
    {
        return [
            
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuditLog::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuditLogCollection::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthPermissionResource::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthPermissionRolePaginatedCollection::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthPermissionRoleResource::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleCollection::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityPaginatedCollection::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityResource::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleResource::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\BaseCustomer::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\BaseIdentity::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\BaseProject::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Collection::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\CollectionPagination::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Customer::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictError::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorExtra::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictError::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorExtra::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Error::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorReferencesItem::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetAuthPermissionCollectionResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetCustomerCollectionResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetIdentityCollectionResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetIdentityProjectCollectionResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetOrganizationCollectionResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\GetProjectCollectionResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Identity::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityProject::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Information::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\InformationResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewAuthRoleResource::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProjectSku::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Organization::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PatchCustomer::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PatchIdentity::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PatchProject::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictError::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorExtra::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ProjectSku::class => false,
            \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ProjectSkuCollection::class => false,
            \Jane\Component\JsonSchemaRuntime\Reference::class => false,
        ];
    }
}