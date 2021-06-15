<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteProjectConflictException extends ConflictException
{
    private $deleteProjectConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse $deleteProjectConflictErrorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->deleteProjectConflictErrorResponse = $deleteProjectConflictErrorResponse;
    }
    public function getDeleteProjectConflictErrorResponse()
    {
        return $this->deleteProjectConflictErrorResponse;
    }
}