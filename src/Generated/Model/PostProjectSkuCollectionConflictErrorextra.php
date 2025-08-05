<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PostProjectSkuCollectionConflictErrorextra extends \ArrayObject
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
     * ProjectSkus
     *
     * @var list<ProjectSku>
     */
    protected $projectSkus;
    /**
     * ProjectSkus
     *
     * @return list<ProjectSku>
     */
    public function getProjectSkus(): array
    {
        return $this->projectSkus;
    }
    /**
     * ProjectSkus
     *
     * @param list<ProjectSku> $projectSkus
     *
     * @return self
     */
    public function setProjectSkus(array $projectSkus): self
    {
        $this->initialized['projectSkus'] = true;
        $this->projectSkus = $projectSkus;
        return $this;
    }
}