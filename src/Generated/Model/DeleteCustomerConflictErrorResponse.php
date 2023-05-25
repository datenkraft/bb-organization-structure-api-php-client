<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class DeleteCustomerConflictErrorResponse extends \ArrayObject
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
     * errors
     *
     * @var mixed[][]
     */
    protected $errors;
    /**
     * errors
     *
     * @return mixed[][]
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
    /**
     * errors
     *
     * @param mixed[][] $errors
     *
     * @return self
     */
    public function setErrors(array $errors) : self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}