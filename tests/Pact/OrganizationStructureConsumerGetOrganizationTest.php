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

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->organizationIdValid = '93baab15-3803-4da2-b33c-ff4663a470f1';
        $this->organizationIdInvalid = '88b6dee1-63b9-479c-baab-4dc7056e62ce';

        $this->organizationId = $this->organizationIdValid;

        $this->requestData = [];
        $this->responseData = [
            'organizationId' => $this->organizationId,
            'name' => 'Organization Test Get'
        ];

        $this->path = '/organization/' . $this->organizationId;
    }

    public function testGetOrganizationSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'An Organization with organizationId exists, ' .
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
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /organization/{organizationId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetOrganizationNotFound(): void
    {
        // Organization with organizationId does not exist
        $this->organizationId = $this->organizationIdInvalid;
        $this->path = '/organization/' . $this->organizationId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('An Organization with organizationId does not exist')
            ->uponReceiving('Not Found GET request to /organization/{organizationId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetOrganizationBadRequest(): void
    {
        // OrganizationId is not a valid uuid
        $this->organizationId = 'non_uuid';
        $this->path = '/organization/' . $this->organizationId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The organizationId in the request is invalid')
            ->uponReceiving('Bad GET request to /organization/{organizationId}');

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
