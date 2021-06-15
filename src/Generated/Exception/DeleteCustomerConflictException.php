<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteCustomerConflictException extends ConflictException
{
    private $deleteCustomerConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse $deleteCustomerConflictErrorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->deleteCustomerConflictErrorResponse = $deleteCustomerConflictErrorResponse;
    }
    public function getDeleteCustomerConflictErrorResponse()
    {
        return $this->deleteCustomerConflictErrorResponse;
    }
}