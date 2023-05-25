<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model;

class PostProjectSkuCollectionConflictError extends \ArrayObject
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
     * Code
     *
     * @var string
     */
    protected $code;
    /**
     * Message
     *
     * @var string
     */
    protected $message;
    /**
     * Extra
     *
     * @var PostProjectSkuCollectionConflictErrorextra
     */
    protected $extra;
    /**
     * Code
     *
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }
    /**
     * Code
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode(string $code) : self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * Message
     *
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }
    /**
     * Message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message) : self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * Extra
     *
     * @return PostProjectSkuCollectionConflictErrorextra
     */
    public function getExtra() : PostProjectSkuCollectionConflictErrorextra
    {
        return $this->extra;
    }
    /**
     * Extra
     *
     * @param PostProjectSkuCollectionConflictErrorextra $extra
     *
     * @return self
     */
    public function setExtra(PostProjectSkuCollectionConflictErrorextra $extra) : self
    {
        $this->initialized['extra'] = true;
        $this->extra = $extra;
        return $this;
    }
}