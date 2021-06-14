<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class ErrorExtra
{
    /**
     * 
     *
     * @var ProjectCustomerRelation[]
     */
    protected $projects;
    /**
     * 
     *
     * @return ProjectCustomerRelation[]
     */
    public function getProjects() : array
    {
        return $this->projects;
    }
    /**
     * 
     *
     * @param ProjectCustomerRelation[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects) : self
    {
        $this->projects = $projects;
        return $this;
    }
}