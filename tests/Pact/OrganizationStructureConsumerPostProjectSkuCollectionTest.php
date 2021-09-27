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
 * Class OrganizationStructureConsumerPostProjectSkuCollectionTest
 * @package Pact
 */
class OrganizationStructureConsumerPostProjectSkuCollectionTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $projectIdValid;
    protected string $projectIdInvalid;

    protected string $skuCode_1;
    protected string $skuCode_2;
    protected string $skuCodeExistingProjectSku;
    protected string $skuCodeDuplicate;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->projectIdValid = 'be7eabd8-5b8c-46d7-ace8-d0e0a8c6ca3f';
        $this->projectIdInvalid = '4cca914e-4b4b-4706-bd7a-2bf2470387e8';

        $this->skuCode_1 = 'skuCode_test1';
        $this->skuCode_2 = 'skuCode_test2';
        $this->skuCodeExistingProjectSku = 'skuCode_test_project_sku_exists';
        $this->skuCodeDuplicate = 'skuCode_test_duplicate';

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
                'skuCode' => $this->skuCode_1,
            ],
            [
                'skuCode' => $this->skuCode_2,
            ],
        ];
        $this->responseData = [
            [
                'projectId' => $this->projectId,
                'skuCode' => $this->skuCode_1,
            ],
            [
                'projectId' => $this->projectId,
                'skuCode' => $this->skuCode_2,
            ]
        ];

        $this->path = '/project/' . $this->projectId . '/sku';
    }

    public function testPostProjectSkuCollectionSuccess(): void
    {
        $this->expectedStatusCode = '201';

        $this->builder
            ->given('The request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful POST request to /project/{projectId}/sku');

        $this->beginTest();
    }


    public function testPostProjectSkuCollectionUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectSkuCollectionForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectSkuCollectionBadRequest(): void
    {
        // Empty skuCode in request body
        $this->requestData = [['skuCode' => '']];

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectSkuCollectionUnprocessableEntity(): void
    {
        // SkuCodes are not unique in request body
        $this->requestData = [['skuCode' => $this->skuCodeDuplicate], ['skuCode' => $this->skuCodeDuplicate]];

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The skuCodes are not unique in the request body')
            ->uponReceiving('Unprocessable POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectSkuCollectionNotFound(): void
    {
        // Project with projectId does not exist
        $this->projectId = $this->projectIdInvalid;
        $this->path = '/project/' . $this->projectId . '/sku';

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Project with projectId does not exist')
            ->uponReceiving('Not Found POST request to /project/{projectId}/sku');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPostProjectSkuCollectionConflict(): void
    {
        // A Project SKU relation with projectId and skuCode already exists
        $this->requestData = [['skuCode' => $this->skuCodeExistingProjectSku]];

        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0] = [
            'code' => strval($this->expectedStatusCode),
            'message' => $this->matcher->like('Example error message'),
            'extra' => [
                'projectSkus' => [
                    [
                        'projectId' => $this->projectId,
                        'skuCode' => $this->skuCodeExistingProjectSku
                    ]
                ],
            ]
        ];

        $this->builder
            ->given('A Project SKU relation with projectId and skuCode already exists')
            ->uponReceiving('Conflicted POST request to /project/{projectId}/sku');

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
            if (isset($data['skuCode'])) {
                $projectSku = new newProjectSku();
                $projectSku->setSkuCode($data['skuCode']);

                $arrProjectSku[] = $projectSku;
            }
        }

        return $client->postProjectSkuCollection($this->projectId, $arrProjectSku, Client::FETCH_RESPONSE);
    }
}
