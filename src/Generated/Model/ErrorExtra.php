<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class ErrorExtra
{
    /**
     * 
     *
     * @var ProjectCustomerRelation[]
     */
    protected $projectsError;
    /**
     * 
     *
     * @return ProjectCustomerRelation[]
     */
    public function getProjectsError() : array
    {
        return $this->projectsError;
    }
    /**
     * 
     *
     * @param ProjectCustomerRelation[] $projectsError
     *
     * @return self
     */
    public function setProjectsError(array $projectsError) : self
    {
        $this->projectsError = $projectsError;
        return $this;
    }
}