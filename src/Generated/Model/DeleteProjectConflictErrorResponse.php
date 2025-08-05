<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteProjectConflictErrorResponse extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * errors
     *
     * @var list<array<string, mixed>>
     */
    protected $errors;
    /**
     * errors
     *
     * @return list<array<string, mixed>>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    /**
     * errors
     *
     * @param list<array<string, mixed>> $errors
     *
     * @return self
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}