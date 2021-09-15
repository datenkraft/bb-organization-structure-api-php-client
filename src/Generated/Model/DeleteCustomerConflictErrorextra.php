<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteCustomerConflictErrorextra
{
    /**
     * Projects
     *
     * @var Project[]
     */
    protected $projects;
    /**
     * Identites
     *
     * @var Identity[]
     */
    protected $identites;
    /**
     * Projects
     *
     * @return Project[]
     */
    public function getProjects() : array
    {
        return $this->projects;
    }
    /**
     * Projects
     *
     * @param Project[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects) : self
    {
        $this->projects = $projects;
        return $this;
    }
    /**
     * Identites
     *
     * @return Identity[]
     */
    public function getIdentites() : array
    {
        return $this->identites;
    }
    /**
     * Identites
     *
     * @param Identity[] $identites
     *
     * @return self
     */
    public function setIdentites(array $identites) : self
    {
        $this->identites = $identites;
        return $this;
    }
}