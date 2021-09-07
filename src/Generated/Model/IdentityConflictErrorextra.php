<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class IdentityConflictErrorextra
{
    /**
     * Identites
     *
     * @var Identity[]
     */
    protected $identites;
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