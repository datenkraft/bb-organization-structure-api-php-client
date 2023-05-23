<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteCustomerConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse
     */
    private $deleteCustomerConflictErrorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse $deleteCustomerConflictErrorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Conflict');
        $this->deleteCustomerConflictErrorResponse = $deleteCustomerConflictErrorResponse;
        $this->response = $response;
    }
    public function getDeleteCustomerConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse
    {
        return $this->deleteCustomerConflictErrorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}