<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class DeleteCustomerConflictErrorExtra implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Projects
     *
     * @var list<Project>
     */
    public array $projects;
    /**
     * Identites
     *
     * @var list<Identity>
     */
    public array $identites;
    public function definedProperties(): array
    {
        return ['projects' => 'projects', 'identites' => 'identites'];
    }
}