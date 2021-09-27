<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerDeleteIdentityTest
 * @package Pact
 */
class OrganizationStructureConsumerDeleteIdentityTest extends OrganizationStructureConsumerTest
{
    protected string $identityId;
    protected string $identityIdValid;
    protected string $identityIdInvalid;
    protected string $identityIdAssigned;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'DELETE';

        $this->token = getenv('CONTRACT_TEST_CLIENT_TOKEN');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [];

        $this->identityIdValid = '13d37dca-03a3-4780-88bd-e08a29f1d665';
        $this->identityIdInvalid = '7f58c308-0e97-48c8-acd8-f7c23f722341';

        $this->identityId = $this->identityIdValid;

        $this->requestData = [];
        $this->responseData = null;

        $this->path = '/identity/' . $this->identityId;
    }

    public function testDeleteIdentitySuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given('A Identity with identityId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful DELETE request to /identity/{identityId}');

        $this->beginTest();
    }

    public function testDeleteIdentityUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized DELETE request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteIdentityForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden DELETE request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteIdentityNotFound(): void
    {
        // Identity with identityId does not exist
        $this->identityId = $this->identityIdInvalid;
        $this->path = '/identity/' . $this->identityId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Identity with identityId does not exist')
            ->uponReceiving('Not Found DELETE request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteIdentityBadRequest(): void
    {
        // IdentityId is not a valid uuid
        $this->identityId = 'non_uuid';
        $this->path = '/identity/' . $this->identityId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The identityId in the request is invalid')
            ->uponReceiving('Bad DELETE request to /identity/{identityId}');

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

        return $client->deleteIdentity($this->identityId, Client::FETCH_RESPONSE);
    }
}
