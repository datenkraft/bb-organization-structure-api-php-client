<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class NewProject
{
    /**
     * Project name
     *
     * @var string
     */
    protected $name;
    /**
     * Project name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * Project name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name) : self
    {
        $this->name = $name;
        return $this;
    }
}