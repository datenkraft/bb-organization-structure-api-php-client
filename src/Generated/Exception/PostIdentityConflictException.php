<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class PostIdentityConflictException extends ConflictException
{
    private $identityConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityConflictErrorResponse $identityConflictErrorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->identityConflictErrorResponse = $identityConflictErrorResponse;
    }
    public function getIdentityConflictErrorResponse()
    {
        return $this->identityConflictErrorResponse;
    }
}