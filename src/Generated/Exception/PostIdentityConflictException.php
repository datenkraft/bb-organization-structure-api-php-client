<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class PostIdentityConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityConflictErrorResponse
     */
    private $identityConflictErrorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityConflictErrorResponse $identityConflictErrorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Conflict');
        $this->identityConflictErrorResponse = $identityConflictErrorResponse;
        $this->response = $response;
    }
    public function getIdentityConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityConflictErrorResponse
    {
        return $this->identityConflictErrorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}