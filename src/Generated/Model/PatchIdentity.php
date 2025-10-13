<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PatchIdentity extends \ArrayObject
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
     * Email
     *
     * @var string
     */
    protected $email;
    /**
     * Is the identity active?
     *
     * @var bool
     */
    protected $active;
    /**
     * The origin of the identity
     *
     * @var string
     */
    protected $origin;
    /**
     * Email
     *
     * @return string
     */
    public function getEmail(): string
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
    public function setEmail(string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * Is the identity active?
     *
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }
    /**
     * Is the identity active?
     *
     * @param bool $active
     *
     * @return self
     */
    public function setActive(bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;
        return $this;
    }
    /**
     * The origin of the identity
     *
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }
    /**
     * The origin of the identity
     *
     * @param string $origin
     *
     * @return self
     */
    public function setOrigin(string $origin): self
    {
        $this->initialized['origin'] = true;
        $this->origin = $origin;
        return $this;
    }
}