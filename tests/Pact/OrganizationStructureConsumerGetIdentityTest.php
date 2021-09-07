<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerGetIdentityTest
 * @package Pact
 */
class OrganizationStructureConsumerGetIdentityTest extends OrganizationStructureConsumerTest
{
    protected string $identityId;
    protected string $identityIdValid;
    protected string $identityIdInvalid;

    protected string $customerId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_IDENTITY_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->identityIdValid = '3db9eee8-dfa7-4b3c-a9ca-d98d1309fd9c';
        $this->identityIdInvalid = '6f645f01-f7ea-48bd-af1b-c2d701aa9967';

        $this->identityId = $this->identityIdValid;

        $this->customerId = 'fb73d11a-3bc7-40b8-86e0-c8c60f89741f';

        $this->requestData = [];
        $this->responseData = [
            'identityId' => $this->identityId,
            'email' => 'identity@test_get.com',
            'customerId' => $this->customerId,
        ];

        $this->path = '/identity/' . $this->identityId;
    }

    public function testGetIdentitySuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'An Identity with identityId exists, the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /identity/{identityId}');

        $this->beginTest();
    }

    public function testGetIdentityUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetIdentityForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetIdentityNotFound(): void
    {
        // Identity with identityId does not exist
        $this->identityId = $this->identityIdInvalid;
        $this->path = '/identity/' . $this->identityId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Identity with identityId does not exist')
            ->uponReceiving('Not Found GET request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetIdentityBadRequest(): void
    {
        // IdentityId is not a valid uuid
        $this->identityId = 'non_uuid';
        $this->path = '/identity/' . $this->identityId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The identityId in the request is invalid')
            ->uponReceiving('Bad GET request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @return ResponseInterface
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

        return $client->getIdentity($this->identityId, Client::FETCH_RESPONSE);
    }
}
