<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class Project implements AdditionalPropertiesInterface
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
    /**
     * Project Id
     *
     * @var string
     */
    public string $projectId;
    public function definedProperties(): array
    {
        return ['customerId' => 'customerId', 'name' => 'name', 'projectId' => 'projectId'];
    }
}