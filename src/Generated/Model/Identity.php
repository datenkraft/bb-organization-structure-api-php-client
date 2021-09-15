<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class Identity
{
    /**
     * Identity Id
     *
     * @var string
     */
    protected $identityId;
    /**
     * Email
     *
     * @var string
     */
    protected $email;
    /**
     * Customer Id
     *
     * @var string
     */
    protected $customerId;
    /**
     * Identity Id
     *
     * @return string
     */
    public function getIdentityId() : string
    {
        return $this->identityId;
    }
    /**
     * Identity Id
     *
     * @param string $identityId
     *
     * @return self
     */
    public function setIdentityId(string $identityId) : self
    {
        $this->identityId = $identityId;
        return $this;
    }
    /**
     * Email
     *
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }
    /**
     * Email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email) : self
    {
        $this->email = $email;
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
}