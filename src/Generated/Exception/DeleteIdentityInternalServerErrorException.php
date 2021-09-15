<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteIdentityInternalServerErrorException extends InternalServerErrorException
{
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Server error', 500);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}