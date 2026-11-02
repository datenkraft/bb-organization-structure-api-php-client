<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class Customer implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Name
     *
     * @var string
     */
    public string $name;
    /**
     * Organization Id
     *
     * @var string
     */
    public string $organizationId;
    /**
     * Customer Id
     *
     * @var string
     */
    public string $customerId;
    public function definedProperties(): array
    {
        return ['name' => 'name', 'organizationId' => 'organizationId', 'customerId' => 'customerId'];
    }
}