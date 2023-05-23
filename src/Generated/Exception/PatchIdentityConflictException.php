<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class PatchIdentityConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityConflictErrorResponse
     */
    private $identityConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityConflictErrorResponse $identityConflictErrorResponse)
    {
        parent::__construct('Conflict');
        $this->identityConflictErrorResponse = $identityConflictErrorResponse;
    }
    public function getIdentityConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityConflictErrorResponse
    {
        return $this->identityConflictErrorResponse;
    }
}