<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteCustomerConflictErrorResponse
{
    /**
     * errors
     *
     * @var DeleteCustomerConflictError[]
     */
    protected $errors;
    /**
     * errors
     *
     * @return DeleteCustomerConflictError[]
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
    /**
     * errors
     *
     * @param DeleteCustomerConflictError[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors) : self
    {
        $this->errors = $errors;
        return $this;
    }
}