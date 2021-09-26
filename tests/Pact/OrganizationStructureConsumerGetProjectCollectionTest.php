<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerGetProjectCollectionTest
 * @package Pact
 */
class OrganizationStructureConsumerGetProjectCollectionTest extends OrganizationStructureConsumerTest
{
    protected string $accountingProfileId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_PROJECT_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->accountingProfileId = 'c4f96d2a-eee7-437f-bf78-622d8a1ae820';

        $this->requestData = [];
        $this->responseData = $this->matcher->eachLike(
            [
                'projectId' => $this->matcher->uuid(),
                'customerId' => $this->matcher->uuid(),
                'name' => $this->matcher->like('Project Test'),
                'accountingProfileId' => $this->matcher->like('uuid-or-empty'),
            ]
        );

        $this->path = '/project';
    }

    /**
     * @throws Exception
     */
    public function testGetProjectCollectionSuccess(): void
    {
        // Filter accountingProfileId is set to a valid accountingProfileId
        $this->queryParams['filter[accountingProfileId]'] = $this->accountingProfileId;

        $this->expectedStatusCode = '200';

        // Response contains only Projects with the valid accountingProfileId
        $this->responseData = $this->matcher->eachLike(
            [
                'projectId' => $this->matcher->uuid(),
                'customerId' => $this->matcher->uuid(),
                'name' => $this->matcher->like('Project Test'),
                'accountingProfileId' => $this->accountingProfileId,
            ]
        );

        $this->builder
            ->given(
                'At least one Project with the accountingProfileId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /project with filter');

        $this->beginTest();
    }

    public function testGetProjectCollectionUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /project');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectCollectionForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /project');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectCollectionBadRequest(): void
    {
        // Filter accountingProfileId is not a valid uuid
        $this->accountingProfileId = 'non_uuid';
        $this->queryParams['filter[accountingProfileId]'] = $this->accountingProfileId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The accountingProfileId in the filter is invalid')
            ->uponReceiving('Bad GET request to /project');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectCollectionSuccessWithoutFilter(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('At least one Project exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful GET request to /project without filter');

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

        return $client->getProjectCollection($this->queryParams, Client::FETCH_RESPONSE);
    }
}
