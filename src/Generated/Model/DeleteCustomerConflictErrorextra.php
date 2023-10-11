<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteCustomerConflictErrorextra extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Projects
     *
     * @var Project[]
     */
    protected $projects;
    /**
     * Identites
     *
     * @var mixed[][]
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
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
    /**
     * Identites
     *
     * @return mixed[][]
     */
    public function getIdentites() : array
    {
        return $this->identites;
    }
    /**
     * Identites
     *
     * @param mixed[][] $identites
     *
     * @return self
     */
    public function setIdentites(array $identites) : self
    {
        $this->initialized['identites'] = true;
        $this->identites = $identites;
        return $this;
    }
}