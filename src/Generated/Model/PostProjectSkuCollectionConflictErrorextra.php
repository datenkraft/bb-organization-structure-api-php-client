<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PostProjectSkuCollectionConflictErrorextra
{
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
        $this->projectSkus = $projectSkus;
        return $this;
    }
}