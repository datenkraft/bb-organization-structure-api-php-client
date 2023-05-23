<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class NewProjectSku extends \ArrayObject
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
        $this->initialized['skuCode'] = true;
        $this->skuCode = $skuCode;
        return $this;
    }
}