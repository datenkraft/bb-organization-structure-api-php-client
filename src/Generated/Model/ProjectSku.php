<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class ProjectSku
{
    /**
     * Project Id
     *
     * @var string
     */
    protected $projectId;
    /**
     * Sku Id
     *
     * @var string
     */
    protected $skuId;
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
     * Sku Id
     *
     * @return string
     */
    public function getSkuId() : string
    {
        return $this->skuId;
    }
    /**
     * Sku Id
     *
     * @param string $skuId
     *
     * @return self
     */
    public function setSkuId(string $skuId) : self
    {
        $this->skuId = $skuId;
        return $this;
    }
}