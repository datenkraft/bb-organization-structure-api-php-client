<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteCustomerConflictException extends ConflictException
{
    private $deleteCustomerErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerErrorResponse $deleteCustomerErrorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->deleteCustomerErrorResponse = $deleteCustomerErrorResponse;
    }
    public function getDeleteCustomerErrorResponse()
    {
        return $this->deleteCustomerErrorResponse;
    }
}