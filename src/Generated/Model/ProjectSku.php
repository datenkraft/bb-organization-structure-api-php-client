<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class ProjectSku implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Project Id
     *
     * @var string
     */
    public string $projectId;
    /**
     * Sku Code
     *
     * @var string
     */
    public string $skuCode;
    public function definedProperties(): array
    {
        return ['projectId' => 'projectId', 'skuCode' => 'skuCode'];
    }
}