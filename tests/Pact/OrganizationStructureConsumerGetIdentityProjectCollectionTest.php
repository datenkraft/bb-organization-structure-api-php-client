<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerGetIdentityProjectCollectionTest
 * @package Pact
 */
class OrganizationStructureConsumerGetIdentityProjectCollectionTest extends OrganizationStructureConsumerTest
{
    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';
        $this->token = getenv('VALID_TOKEN_IDENTITY_PROJECT_GET');
        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->requestData = [];
        $this->responseData = $this->matcher->eachLike(
            [
                'identityId' => $this->matcher->uuid(),
                'projectIds' => $this->matcher->eachLike(
                    $this->matcher->uuid()
                ),
            ]
        );

        $this->path = '/identity-project';
    }

    public function testGetIdentityProjectCollectionSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'At least one Identity with related Projects exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /identity-project');

        $this->beginTest();
    }

    public function testGetIdentityProjectCollectionUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /identity-project');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetIdentityProjectCollectionForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /identity-project');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws ConfigException
     * @throws AuthException
     */
    protected function doClientRequest(): ResponseInterface
    {
        $factory = new ClientFactory(
            ['clientId' => 'test', 'clientSecret' => 'test', 'oAuthTokenUrl' => 'test', 'oAuthScopes' => ['test']]
        );
        $factory->setToken($this->token);
        $client = Client::createWithFactory($factory, $this->config->getBaseUri());

        return $client->getIdentityProjectCollection(Client::FETCH_RESPONSE);
    }
}