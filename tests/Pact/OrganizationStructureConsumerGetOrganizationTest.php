<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerGetOrganizationTest
 * @package Pact
 */
class OrganizationStructureConsumerGetOrganizationTest extends OrganizationStructureConsumerTest
{
    protected string $organizationId;
    protected string $organizationIdValid;
    protected string $organizationIdInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_ORGANIZATION_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->organizationIdValid = 'organizationId_test';
        $this->organizationIdInvalid = 'organizationId_test_invalid';

        $this->organizationId = $this->organizationIdValid;

        $this->requestData = [];
        $this->responseData = [
            'organizationId' => $this->organizationId,
            'name' => 'Organization Test'
        ];

        $this->path = '/organization/' . $this->organizationId;
    }

    public function testGetOrganizationSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'An Organization with OrganizationId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /organization/{organizationId}');

        $this->beginTest();
    }

    public function testGetOrganizationUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /organization/{organizationId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetOrganizationForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /organization/{organizationId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetOrganizationNotFound(): void
    {
        // Path with organizationId for non existent organization
        $this->organizationId = $this->organizationIdInvalid;
        $this->path = '/organization/' . $this->organizationId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'An Organization with organizationId does not exist'
            )
            ->uponReceiving('Not Found GET request to /organization/{organizationId}');

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

        return $client->getOrganization($this->organizationId, Client::FETCH_RESPONSE);
    }

}
