<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class Organization implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Organization Id
     *
     * @var string
     */
    public string $organizationId;
    /**
     * Name
     *
     * @var string
     */
    public string $name;
    public function definedProperties(): array
    {
        return ['organizationId' => 'organizationId', 'name' => 'name'];
    }
}