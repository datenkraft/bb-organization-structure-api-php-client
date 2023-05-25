<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PatchProject extends \ArrayObject
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
        $this->initialized['customerId'] = true;
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
        $this->initialized['name'] = true;
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
        $this->initialized['accountingProfileId'] = true;
        $this->accountingProfileId = $accountingProfileId;
        return $this;
    }
}