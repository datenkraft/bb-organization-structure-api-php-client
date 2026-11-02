<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class DeleteCustomerConflictException extends ConflictException
{
    public function __construct(
        /**
         * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse
         */
        private readonly \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse $deleteCustomerConflictErrorResponse,
        /**
         * @var \Symfony\Contracts\HttpClient\ResponseInterface
         */
        private readonly \Symfony\Contracts\HttpClient\ResponseInterface $response
    )
    {
        parent::__construct('Conflict

Error codes:
- DATA_ALREADY_EXISTS: A data conflict was detected.');
    }
    public function getDeleteCustomerConflictErrorResponse(): \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\DeleteCustomerConflictErrorResponse
    {
        return $this->deleteCustomerConflictErrorResponse;
    }
    public function getResponse(): \Symfony\Contracts\HttpClient\ResponseInterface
    {
        return $this->response;
    }
}