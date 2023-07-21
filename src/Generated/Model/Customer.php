<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class Customer
{
    /**
     * Customer Id
     *
     * @var string
     */
    protected $customerId;
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
     * Customer Id
     *
     * @return string
     */
    public function getCustomerId() : string
    {
        return $this->customerId;
    }
    /**
     * Customer Id
     *
     * @param string $customerId
     *
     * @return self
     */
    public function setCustomerId(string $customerId) : self
    {
        $this->customerId = $customerId;
        return $this;
    }
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
        $this->organizationId = $organizationId;
        return $this;
    }
}