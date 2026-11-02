<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class PatchIdentity implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Email
     *
     * @var string
     */
    public string $email;
    /**
     * Is the identity active?
     *
     * @var bool
     */
    public bool $active;
    /**
     * The origin of the identity
     *
     * @var string
     */
    public string $origin;
    public function definedProperties(): array
    {
        return ['email' => 'email', 'active' => 'active', 'origin' => 'origin'];
    }
}