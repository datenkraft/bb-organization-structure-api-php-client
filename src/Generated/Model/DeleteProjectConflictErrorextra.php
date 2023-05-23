<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteProjectConflictErrorextra extends \ArrayObject
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
     * ProjectSkus
     *
     * @var ProjectSku[]
     */
    protected $projectSkus;
    /**
     * ProjectSkus
     *
     * @return ProjectSku[]
     */
    public function getProjectSkus() : array
    {
        return $this->projectSkus;
    }
    /**
     * ProjectSkus
     *
     * @param ProjectSku[] $projectSkus
     *
     * @return self
     */
    public function setProjectSkus(array $projectSkus) : self
    {
        $this->initialized['projectSkus'] = true;
        $this->projectSkus = $projectSkus;
        return $this;
    }
}