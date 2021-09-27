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
class OrganizationStructureConsumerGetProjectSkuCollectionTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $projectIdValid;
    protected string $projectIdInvalid;

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

        $this->projectIdValid = '8161831e-3a75-4aa8-ab80-31f94fe79c96';
        $this->projectIdInvalid = '4cca914e-4b4b-4706-bd7a-2bf2470387e8';

        $this->projectId = $this->projectIdValid;

        $this->requestData = [];
        $this->responseData = $this->matcher->eachLike(
            [
                'projectId' => $this->projectId,
                'skuCode' => $this->matcher->like('skuCode_test_get1'),
            ]
        );

        $this->path = '/project/' . $this->projectId . '/sku';
    }

    public function testGetProjectSkuCollectionSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'At least one Project SKU relation with projectId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /project/{projectId}/sku');

        $this->beginTest();
    }

    public function testGetProjectSkuCollectionUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectSkuCollectionForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectSkuCollectionNotFound(): void
    {
        // Project with projectId does not exist
        $this->projectId = $this->projectIdInvalid;
        $this->path = '/project/' . $this->projectId . '/sku';

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Project with projectId does not exist')
            ->uponReceiving('Not Found GET request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectSkuCollectionBadRequest(): void
    {
        // ProjectId is not a valid uuid
        $this->projectId = 'non_uuid';
        $this->path = '/project/' . $this->projectId . '/sku';

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The projectId in the request is invalid')
            ->uponReceiving('Bad GET request to /project/{projectId}/sku');

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

        return $client->getProjectSkuCollection($this->projectId, Client::FETCH_RESPONSE);
    }
}
