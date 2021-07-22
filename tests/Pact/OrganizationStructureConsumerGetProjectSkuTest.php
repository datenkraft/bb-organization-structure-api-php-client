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
class OrganizationStructureConsumerGetProjectSkuTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $projectIdValid;
    protected string $projectIdInvalid;

    protected string $skuCode;
    protected string $skuCodeValid;
    protected string $skuCodeInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_PROJECT_SKU_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->projectIdValid = 'projectId_test_projectsku_get';
        $this->projectIdInvalid = 'projectId_test_invalid';

        $this->skuCodeValid = 'skuCode_test_get1';
        $this->skuCodeInvalid = 'skuCode_test_invalid';

        $this->projectId = $this->projectIdValid;
        $this->skuCode = $this->skuCodeValid;

        $this->requestData = [];
        $this->responseData = [
            'projectId' => $this->projectId,
            'skuCode' => $this->skuCode,
        ];

        $this->path = '/project/' . $this->projectId . '/sku/' . $this->skuCode;
    }

    public function testGetProjectSkuSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'A Project-SKU relation with ProjectId and SkuCode exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /project/{projectId}/sku/{skuCode}');

        $this->beginTest();
    }

    public function testGetProjectSkuUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /project/{projectId}/sku/{skuCode}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectSkuForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /project/{projectId}/sku/{skuCode}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetProjectSkuNotFound(): void
    {
        // Path with projectId and skuCode for non existent projectSku relation
        $this->projectId = $this->projectIdInvalid;
        $this->skuCode = $this->skuCodeInvalid;
        $this->path = '/project/' . $this->projectId . '/sku/' . $this->skuCode;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Project-SKU relation with projectId and skuCode does not exist')
            ->uponReceiving('Not Found GET request to /project/{projectId}/sku/{skuCode}');

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

        return $client->getProjectSku($this->projectId, $this->skuCode, Client::FETCH_RESPONSE);
    }
}
