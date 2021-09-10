<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerGetIdentityCollectionTest
 * @package Pact
 */
class OrganizationStructureConsumerGetIdentityCollectionTest extends OrganizationStructureConsumerTest
{
    protected string $email;

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

        $this->email = 'identity@test.com';

        $this->requestData = [];
        $this->responseData = $this->matcher->eachLike(
            [
                'identityId' => $this->matcher->uuid(),
                'email' => $this->matcher->like('identity@test.com'),
                'customerId' => $this->matcher->uuid(),
            ]
        );

        $this->path = '/identity';
    }

    /**
     * @throws Exception
     */
    public function testGetIdentityCollectionSuccess(): void
    {
        // Filter email is set to a valid email
        $this->queryParams['filter[email]'] = $this->email;

        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'At least one Identity with the accountingProfileId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /identity with filter');

        $this->beginTest();
    }

    public function testGetIdentityCollectionUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetIdentityCollectionForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetIdentityCollectionBadRequest(): void
    {
        // Filter email is not a valid email
        $this->email = 'not_an_email';
        $this->queryParams['filter[email]'] = $this->email;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The email in the filter is invalid')
            ->uponReceiving('Bad GET request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetIdentityCollectionSuccessWithoutFilter(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('At least one Identity exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful GET request to /identity without filter');

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

        return $client->getIdentityCollection($this->queryParams, Client::FETCH_RESPONSE);
    }
}
