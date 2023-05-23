<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class BaseCustomer extends \ArrayObject
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
     * Name
     *
     * @var string
     */
    protected $name;
    /**
     * Organization Id
     *
     * @var string
     */
    protected $organizationId;
    /**
     * Name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * Name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name) : self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Organization Id
     *
     * @return string
     */
    public function getOrganizationId() : string
    {
        return $this->organizationId;
    }
    /**
     * Organization Id
     *
     * @param string $organizationId
     *
     * @return self
     */
    public function setOrganizationId(string $organizationId) : self
    {
        $this->initialized['organizationId'] = true;
        $this->organizationId = $organizationId;
        return $this;
    }
}