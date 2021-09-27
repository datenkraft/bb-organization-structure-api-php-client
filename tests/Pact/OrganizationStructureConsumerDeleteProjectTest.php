<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerDeleteProjectTest
 * @package Pact
 */
class OrganizationStructureConsumerDeleteProjectTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $projectIdValid;
    protected string $projectIdInvalid;
    protected string $projectIdAssigned;

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

        $this->projectIdValid = '21274cd6-7628-417f-b74d-9945f508e384';
        $this->projectIdInvalid = '4cca914e-4b4b-4706-bd7a-2bf2470387e8';
        $this->projectIdAssigned = '98bfa51b-a9e3-4b5c-8d54-104026fd824a';

        $this->projectId = $this->projectIdValid;

        $this->requestData = [];
        $this->responseData = null;

        $this->path = '/project/' . $this->projectId;
    }

    public function testDeleteProjectSuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given('A Project with projectId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful DELETE request to /project/{projectId}');

        $this->beginTest();
    }

    public function testDeleteProjectUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized DELETE request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden DELETE request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectNotFound(): void
    {
        // Project with projectId does not exist
        $this->projectId = $this->projectIdInvalid;
        $this->path = '/project/' . $this->projectId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Project with projectId does not exist')
            ->uponReceiving('Not Found DELETE request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testDeleteProjectConflict(): void
    {
        // Project with projectId is assigned to a Sku
        $this->projectId = $this->projectIdAssigned;
        $this->path = '/project/' . $this->projectIdAssigned;

        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0] = [
            'code' => strval($this->expectedStatusCode),
            'message' => $this->matcher->like('Example error message'),
            'extra' => [
                'projectSkus' => [
                    [
                        'projectId' => $this->projectIdAssigned,
                        'skuCode' => $this->matcher->like('Example skuCode')
                    ]
                ],
            ]
        ];

        $this->builder
            ->given('A Project with projectId is assigned to at least one Sku')
            ->uponReceiving('Conflicted DELETE request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteProjectBadRequest(): void
    {
        // ProjectId is not a valid uuid
        $this->projectId = 'non_uuid';
        $this->path = '/project/' . $this->projectId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The projectId in the request is invalid')
            ->uponReceiving('Bad DELETE request to /project/{projectId}');

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

        return $client->deleteProject($this->projectId, Client::FETCH_RESPONSE);
    }
}
