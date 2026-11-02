<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\AdditionalPropertiesInterface;
class DeleteProjectConflictError implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Code
     *
     * @var string
     */
    public string $code;
    /**
     * Message
     *
     * @var string
     */
    public string $message;
    /**
     * References
     *
     * @var list<ErrorReferencesItem>
     */
    public array $references;
    /**
     * Extra
     *
     * @var DeleteProjectConflictErrorExtra
     */
    public DeleteProjectConflictErrorExtra $extra;
    public function definedProperties(): array
    {
        return ['code' => 'code', 'message' => 'message', 'references' => 'references', 'extra' => 'extra'];
    }
}