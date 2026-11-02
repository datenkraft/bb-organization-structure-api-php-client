<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class Identity implements AdditionalPropertiesInterface
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
    /**
     * Identity Id
     *
     * @var string
     */
    public string $identityId;
    public function definedProperties(): array
    {
        return ['email' => 'email', 'active' => 'active', 'origin' => 'origin', 'identityId' => 'identityId'];
    }
}