<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class PostProjectSkuCollectionConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse
     */
    private $postProjectSkuCollectionConflictErrorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse $postProjectSkuCollectionConflictErrorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Conflict');
        $this->postProjectSkuCollectionConflictErrorResponse = $postProjectSkuCollectionConflictErrorResponse;
        $this->response = $response;
    }
    public function getPostProjectSkuCollectionConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse
    {
        return $this->postProjectSkuCollectionConflictErrorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}