<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PostProjectSkuCollectionConflictErrorResponse
{
    /**
     * errors
     *
     * @var PostProjectSkuCollectionConflictError[]
     */
    protected $errors;
    /**
     * errors
     *
     * @return PostProjectSkuCollectionConflictError[]
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
    /**
     * errors
     *
     * @param PostProjectSkuCollectionConflictError[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors) : self
    {
        $this->errors = $errors;
        return $this;
    }
}