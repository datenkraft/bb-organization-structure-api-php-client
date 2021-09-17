<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class IdentityProject
{
    /**
     * Identity ID
     *
     * @var string
     */
    protected $identityId;
    /**
     * Related Project IDs
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * Identity ID
     *
     * @return string
     */
    public function getIdentityId() : string
    {
        return $this->identityId;
    }
    /**
     * Identity ID
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
     * Related Project IDs
     *
     * @return string[]
     */
    public function getProjectIds() : array
    {
        return $this->projectIds;
    }
    /**
     * Related Project IDs
     *
     * @param string[] $projectIds
     *
     * @return self
     */
    public function setProjectIds(array $projectIds) : self
    {
        $this->projectIds = $projectIds;
        return $this;
    }
}