<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class ProjectCustomerRelation
{
    /**
     * Project Id
     *
     * @var string
     */
    protected $projectId;
    /**
     * Customer Id
     *
     * @var string
     */
    protected $customerId;
    /**
     * Customer name
     *
     * @var string
     */
    protected $name;
    /**
     * Project Id
     *
     * @return string
     */
    public function getProjectId() : string
    {
        return $this->projectId;
    }
    /**
     * Project Id
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId) : self
    {
        $this->projectId = $projectId;
        return $this;
    }
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
     * Customer name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * Customer name
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
}