<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class ConflictErrorResponse
{
    /**
     * conflictErrors
     *
     * @var ConflictError[]
     */
    protected $conflictErrors;
    /**
     * conflictErrors
     *
     * @return ConflictError[]
     */
    public function getConflictErrors() : array
    {
        return $this->conflictErrors;
    }
    /**
     * conflictErrors
     *
     * @param ConflictError[] $conflictErrors
     *
     * @return self
     */
    public function setConflictErrors(array $conflictErrors) : self
    {
        $this->conflictErrors = $conflictErrors;
        return $this;
    }
}