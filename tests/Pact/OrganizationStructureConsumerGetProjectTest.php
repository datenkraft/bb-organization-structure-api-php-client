<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerGetProjectTest
 * @package Pact
 */
class OrganizationStructureConsumerGetProjectTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $projectIdValid;
    protected string $projectIdInvalid;
    protected string $customerId;
    protected string $accountingProfileId;

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

        $this->projectIdValid = '0da63378-426c-4d69-82d7-63afedc0ca5e';
        $this->projectIdInvalid = '4cca914e-4b4b-4706-bd7a-2bf2470387e8';

        $this->customerId = 'fb73d11a-3bc7-40b8-86e0-c8c60f89741f';
        $this->accountingProfileId = 'c4f96d2a-eee7-437f-bf78-622d8a1ae820';

        $this->projectId = $this->projectIdValid;

        $this->requestData = [];
        $this->responseData = [
            'projectId' => $this->projectId,
            'customerId' => $this->customerId,
            'name' => 'Project Test Get',
            'accountingProfileId' => $this->accountingProfileId,
        ];

        $this->path = '/project/' . $this->projectId;
    }

    public function testGetProjectSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A Project with projectId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful GET request to /project/{projectId}');

        $this->beginTest();
    }

    public function testGetProjectUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectNotFound(): void
    {
        // Project with projectId does not exist
        $this->projectId = $this->projectIdInvalid;
        $this->path = '/project/' . $this->projectId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Project with projectId does not exist')
            ->uponReceiving('Not Found GET request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectBadRequest(): void
    {
        // ProjectId is not a valid uuid
        $this->projectId = 'non_uuid';
        $this->path = '/project/' . $this->projectId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The projectId in the request is invalid')
            ->uponReceiving('Bad GET request to /project/{projectId}');

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

        return $client->getProject($this->projectId, Client::FETCH_RESPONSE);
    }
}
