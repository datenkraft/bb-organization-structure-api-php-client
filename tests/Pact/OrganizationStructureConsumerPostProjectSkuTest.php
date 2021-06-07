<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProjectSku;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerPostProjectSkuTest
 * @package Pact
 */
class OrganizationStructureConsumerPostProjectSkuTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $projectIdValid;
    protected string $projectIdInvalid;

    protected string $skuId_1;
    protected string $skuId_2;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->token = getenv('VALID_TOKEN_PROJECT_SKU_POST');

        $this->projectIdValid = 'projectId_test_post';
        $this->projectIdInvalid = 'projectId_test_invalid';

        $this->skuId_1 = 'skuId_test_post1';
        $this->skuId_2 = 'skuId_test_post2';

        $this->projectId = $this->projectIdValid;

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->requestData = [
            [
                'skuId' => $this->skuId_1,
            ],
            [
                'skuId' => $this->skuId_2,
            ],
        ];
        $this->responseData = [
            [
                'projectId' => $this->projectId,
                'skuId' => $this->skuId_1,
            ],
            [
                'projectId' => $this->projectId,
                'skuId' => $this->skuId_2,
            ]
        ];

        $this->path = '/project/' . $this->projectId . '/sku';
    }

    public function testPostProjectSkuSuccess(): void
    {
        $this->expectedStatusCode = '201';

        $this->builder
            ->given(
                'The request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful POST request to /project/{projectId}/sku');

        $this->beginTest();
    }


    public function testPostProjectSkuUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer '.$this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectSkuForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer '.$this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectSkuBadRequest(): void
    {
        $this->requestData[] = [
            'skuId' => '',
        ];

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectSkusNotFound(): void
    {
        // Path with projectId for non existent project
        $this->projectId = $this->projectIdInvalid;
        $this->path = '/project/' . $this->projectId . '/sku';

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A Project with projectId does not exist'
            )
            ->uponReceiving('Not Found GET request to /project/{projectId}/sku');

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

        $arrProjectSku = [];
        foreach ($this->requestData as $data) {
            if (isset($data['skuId'])) {
                $projectSku = new newProjectSku();
                $projectSku->setSkuId($data['skuId']);

                $arrProjectSku[] = $projectSku;
            }
        }

        return $client->PostProjectSku($this->projectId, $arrProjectSku, Client::FETCH_RESPONSE);
    }
}
