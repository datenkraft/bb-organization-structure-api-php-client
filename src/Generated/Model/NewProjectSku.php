<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class NewProjectSku
{
    /**
     * Sku Code
     *
     * @var string
     */
    protected $skuCode;
    /**
     * Sku Code
     *
     * @return string
     */
    public function getSkuCode() : string
    {
        return $this->skuCode;
    }
    /**
     * Sku Code
     *
     * @param string $skuCode
     *
     * @return self
     */
    public function setSkuCode(string $skuCode) : self
    {
        $this->skuCode = $skuCode;
        return $this;
    }
}