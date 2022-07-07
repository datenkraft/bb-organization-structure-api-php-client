<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class PostProjectSkuCollectionConflictException extends ConflictException
{
    /**
     * @var \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse
     */
    private $postProjectSkuCollectionConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse $postProjectSkuCollectionConflictErrorResponse)
    {
        parent::__construct('Conflict');
        $this->postProjectSkuCollectionConflictErrorResponse = $postProjectSkuCollectionConflictErrorResponse;
    }
    public function getPostProjectSkuCollectionConflictErrorResponse() : \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse
    {
        return $this->postProjectSkuCollectionConflictErrorResponse;
    }
}