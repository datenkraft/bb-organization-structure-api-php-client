<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class IdentityConflictErrorResponse
{
    /**
     * errors
     *
     * @var IdentityConflictError[]
     */
    protected $errors;
    /**
     * errors
     *
     * @return IdentityConflictError[]
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
    /**
     * errors
     *
     * @param IdentityConflictError[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors) : self
    {
        $this->errors = $errors;
        return $this;
    }
}