<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteProjectConflictErrorResponse
{
    /**
     * errors
     *
     * @var DeleteProjectConflictError[]
     */
    protected $errors;
    /**
     * errors
     *
     * @return DeleteProjectConflictError[]
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
    /**
     * errors
     *
     * @param DeleteProjectConflictError[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors) : self
    {
        $this->errors = $errors;
        return $this;
    }
}