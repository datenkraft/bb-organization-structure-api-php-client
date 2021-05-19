<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception;

final class UnexpectedStatusCodeException extends \RuntimeException implements ClientException
{
    public function __construct($status, $message = '')
    {
        parent::__construct($message, $status);
    }
}