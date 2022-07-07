<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteCustomerConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse
     */
    private $deleteCustomerConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse $deleteCustomerConflictErrorResponse)
    {
        parent::__construct('Conflict');
        $this->deleteCustomerConflictErrorResponse = $deleteCustomerConflictErrorResponse;
    }
    public function getDeleteCustomerConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse
    {
        return $this->deleteCustomerConflictErrorResponse;
    }
}