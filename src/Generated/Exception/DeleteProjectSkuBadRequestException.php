<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteProjectSkuBadRequestException extends BadRequestException
{
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Bad Request', 400);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}