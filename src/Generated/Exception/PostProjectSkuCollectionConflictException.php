<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class PostProjectSkuCollectionConflictException extends ConflictException
{
    private $postProjectSkuCollectionConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse $postProjectSkuCollectionConflictErrorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->postProjectSkuCollectionConflictErrorResponse = $postProjectSkuCollectionConflictErrorResponse;
    }
    public function getPostProjectSkuCollectionConflictErrorResponse()
    {
        return $this->postProjectSkuCollectionConflictErrorResponse;
    }
}