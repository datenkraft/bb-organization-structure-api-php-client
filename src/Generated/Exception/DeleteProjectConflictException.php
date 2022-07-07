<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteProjectConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse
     */
    private $deleteProjectConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse $deleteProjectConflictErrorResponse)
    {
        parent::__construct('Conflict');
        $this->deleteProjectConflictErrorResponse = $deleteProjectConflictErrorResponse;
    }
    public function getDeleteProjectConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse
    {
        return $this->deleteProjectConflictErrorResponse;
    }
}