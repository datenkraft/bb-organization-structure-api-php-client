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

    protected string $skuCode;
    protected string $skuCodeValid;
    protected string $skuCodeInvalid;

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

        $this->projectIdValid = 'be7eabd8-5b8c-46d7-ace8-d0e0a8c6ca3f';
        $this->projectIdInvalid = 'd73e7c86-4732-45a2-87ac-7d75bb126149';

        $this->skuCodeValid = 'skuCode_test_delete';
        $this->skuCodeInvalid = 'skuCode_test_delete_invalid';

        $this->projectId = $this->projectIdValid;
        $this->skuCode = $this->skuCodeValid;

        $this->requestData = [];
        $this->responseData = null;

        $this->path = '/project/' . $this->projectId . '/sku/' . $this->skuCode;
    }

    public function testDeleteProjectSkuSuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given(
                'A Project SKU relation with projectId and skuCode exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful DELETE request to /project/{projectId}/sku/{skuCode}');

        $this->beginTest();
    }

    public function testDeleteProjectSkuUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized DELETE request to /project/{projectId}/sku/{skuCode}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectSkuForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden DELETE request to /project/{projectId}/sku/{skuCode}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectSkuNotFound(): void
    {
        // Project SKU relation with projectId and skuCode does not exist
        $this->projectId = $this->projectIdInvalid;
        $this->skuCode = $this->skuCodeInvalid;
        $this->path = '/project/' . $this->projectId . '/sku/' . $this->skuCode;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Project SKU relation with projectId and skuCode does not exist')
            ->uponReceiving('Not Found DELETE request to /project/{projectId}/sku/{skuCode}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectSkuBadRequest(): void
    {
        // ProjectId is not a valid uuid
        $this->projectId = 'non_uuid';
        $this->path = '/project/' . $this->projectId . '/sku/' . $this->skuCode;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The projectId in the request is invalid')
            ->uponReceiving('Bad DELETE request to /project/{projectId}/sku/{skuCode}');

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

        return $client->deleteProjectSku($this->projectId, $this->skuCode, Client::FETCH_RESPONSE);
    }
}
