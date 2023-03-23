<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PatchProject
{
    /**
     * Customer Id
     *
     * @var string
     */
    protected $customerId;
    /**
     * Project name
     *
     * @var string
     */
    protected $name;
    /**
     * Accounting Profile Id
     *
     * @var string
     */
    protected $accountingProfileId;
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
     * Project name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * Project name
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
     * Accounting Profile Id
     *
     * @return string
     */
    public function getAccountingProfileId() : string
    {
        return $this->accountingProfileId;
    }
    /**
     * Accounting Profile Id
     *
     * @param string $accountingProfileId
     *
     * @return self
     */
    public function setAccountingProfileId(string $accountingProfileId) : self
    {
        $this->accountingProfileId = $accountingProfileId;
        return $this;
    }
}