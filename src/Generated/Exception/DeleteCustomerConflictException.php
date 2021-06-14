<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteCustomerConflictException extends ConflictException
{
    private $conflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ConflictErrorResponse $conflictErrorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->conflictErrorResponse = $conflictErrorResponse;
    }
    public function getConflictErrorResponse()
    {
        return $this->conflictErrorResponse;
    }
}