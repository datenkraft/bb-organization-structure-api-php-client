<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class GetProjectSkuCollectionForbiddenException extends ForbiddenException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse
     */
    private $errorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Forbidden

Error codes:
- PERMISSIONS_MISSING: No authorization for the called action was found.');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }
    public function getErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}