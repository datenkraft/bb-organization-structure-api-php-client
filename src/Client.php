<?php

declare(strict_types=1);

namespace Datenkraft\Backbone\Client\OrganizationStructureApi;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;

/**
 * Class Client
 * @package Datenkraft\Backbone\Client\OrganizationStructureApi
 */
class Client extends Generated\Client
{
    /**
     * @param ClientFactory $clientFactory
     * @param string|null $endpointUrl
     * @return static
     * @throws AuthException
     */
    public static function createWithFactory(ClientFactory $clientFactory, string $endpointUrl = null): self
    {
        $endpointUrl = $endpointUrl ?? getenv('X_DATENKRAFT_ORGANIZATION_STRUCTURE_API_URL') ?: null;
        return $clientFactory->createClient(static::class, $endpointUrl);
    }
}
