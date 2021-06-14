<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteCustomerErrorResponse
{
    /**
     * deleteCustomerErrors
     *
     * @var DeleteCustomerError[]
     */
    protected $deleteCustomerErrors;
    /**
     * deleteCustomerErrors
     *
     * @return DeleteCustomerError[]
     */
    public function getDeleteCustomerErrors() : array
    {
        return $this->deleteCustomerErrors;
    }
    /**
     * deleteCustomerErrors
     *
     * @param DeleteCustomerError[] $deleteCustomerErrors
     *
     * @return self
     */
    public function setDeleteCustomerErrors(array $deleteCustomerErrors) : self
    {
        $this->deleteCustomerErrors = $deleteCustomerErrors;
        return $this;
    }
}