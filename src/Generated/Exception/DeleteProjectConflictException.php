<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteProjectConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse
     */
    private $deleteProjectConflictErrorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse $deleteProjectConflictErrorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Conflict');
        $this->deleteProjectConflictErrorResponse = $deleteProjectConflictErrorResponse;
        $this->response = $response;
    }
    public function getDeleteProjectConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteProjectConflictErrorResponse
    {
        return $this->deleteProjectConflictErrorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}