<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class NewProject implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Customer Id
     *
     * @var string
     */
    public string $customerId;
    /**
     * Project name
     *
     * @var string
     */
    public string $name;
    public function definedProperties(): array
    {
        return ['customerId' => 'customerId', 'name' => 'name'];
    }
}