<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerDeleteProjectSkuTest
 * @package Pact
 */
class OrganizationStructureConsumerDeleteProjectSkuTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $projectIdValid;
    protected string $projectIdInvalid;

    protected string $skuId;
    protected string $skuIdValid;
    protected string $skuIdInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'DELETE';

        $this->token = getenv('VALID_TOKEN_PROJECT_SKU_DELETE');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [];

        $this->projectIdValid = 'projectId_test_projectsku';
        $this->projectIdInvalid = 'projectId_test_delete_invalid';

        $this->skuIdValid = 'skuId_test_delete';
        $this->skuIdInvalid = 'skuId_test_delete_invalid';

        $this->projectId = $this->projectIdValid;
        $this->skuId = $this->skuIdValid;

        $this->requestData = [];
        $this->responseData = null;

        $this->path = '/project/' . $this->projectId . '/sku/' . $this->skuId;
    }

    public function testDeleteProjectSkuSuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given(
                'A Project-SKU relation with projectId and skuId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful DELETE request to /project/{projectId}/sku/{skuId}');

        $this->beginTest();
    }

    public function testDeleteProjectSkuUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized DELETE request to /project/{projectId}/sku/{skuId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectSkuForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden DELETE request to /project/{projectId}/sku/{skuId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectSkuNotFound(): void
    {
        // Path with projectId and skuId for non existent projectSku relation
        $this->projectId = $this->projectIdInvalid;
        $this->skuId = $this->skuIdInvalid;
        $this->path = '/project/' . $this->projectId . '/sku/' . $this->skuId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A customer with customerId does not exist'
            )
            ->uponReceiving('Not Found DELETE request to /project/{projectId}/sku/{skuId}');

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

        return $client->deleteProjectSku($this->projectId, $this->skuId, Client::FETCH_RESPONSE);
    }
}
