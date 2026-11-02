<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class DeleteProjectConflictErrorExtra implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * ProjectSkus
     *
     * @var list<ProjectSku>
     */
    public array $projectSkus;
    public function definedProperties(): array
    {
        return ['projectSkus' => 'projectSkus'];
    }
}