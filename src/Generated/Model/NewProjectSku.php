<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class NewProjectSku
{
    /**
     * Sku Id
     *
     * @var string
     */
    protected $skuId;
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