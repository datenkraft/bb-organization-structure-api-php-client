<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PatchIdentity
{
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