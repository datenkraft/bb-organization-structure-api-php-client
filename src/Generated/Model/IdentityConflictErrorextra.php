<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class IdentityConflictErrorextra extends \ArrayObject
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
     * Identites
     *
     * @var mixed[][]
     */
    protected $identites;
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