<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class NewProjectSku implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Sku Code
     *
     * @var string
     */
    public string $skuCode;
    public function definedProperties(): array
    {
        return ['skuCode' => 'skuCode'];
    }
}