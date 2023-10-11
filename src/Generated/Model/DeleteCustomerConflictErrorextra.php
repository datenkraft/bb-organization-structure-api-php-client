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
     * @var mixed[][]
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
     * @return mixed[][]
     */
    public function getProjects() : array
    {
        return $this->projects;
    }
    /**
     * Projects
     *
     * @param mixed[][] $projects
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
        $this->initialized['identites'] = true;
        $this->identites = $identites;
        return $this;
    }
}