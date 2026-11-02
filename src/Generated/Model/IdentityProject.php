<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class IdentityProject implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Identity ID
     *
     * @var string
     */
    public string $identityId;
    /**
     * Related Project ID
     *
     * @var string
     */
    public string $projectId;
    public function definedProperties(): array
    {
        return ['identityId' => 'identityId', 'projectId' => 'projectId'];
    }
}