<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteCustomerConflictErrorextra extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Projects
     *
     * @var list<Project>
     */
    protected $projects;
    /**
     * Identites
     *
     * @var list<Identity>
     */
    protected $identites;
    /**
     * Projects
     *
     * @return list<Project>
     */
    public function getProjects(): array
    {
        return $this->projects;
    }
    /**
     * Projects
     *
     * @param list<Project> $projects
     *
     * @return self
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
    /**
     * Identites
     *
     * @return list<Identity>
     */
    public function getIdentites(): array
    {
        return $this->identites;
    }
    /**
     * Identites
     *
     * @param list<Identity> $identites
     *
     * @return self
     */
    public function setIdentites(array $identites): self
    {
        $this->initialized['identites'] = true;
        $this->identites = $identites;
        return $this;
    }
}