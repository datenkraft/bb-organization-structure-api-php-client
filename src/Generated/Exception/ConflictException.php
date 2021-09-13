<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

class ConflictException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 409);
    }
}