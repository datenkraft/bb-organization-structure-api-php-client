<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerPutProjectTest
 * @package Pact
 */
class OrganizationStructureConsumerPutProjectTest extends OrganizationStructureConsumerTest
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

        $this->method = 'PUT';

        $this->token = getenv('VALID_TOKEN_PROJECT_PUT');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->projectIdValid = 'projectId_test';
        $this->projectIdInvalid = 'projectId_test_invalid';

        $this->projectId = $this->projectIdValid;

        $this->requestData = [
            'name' => 'Project Name'
        ];
        $this->responseData = [
            'projectId' => $this->projectId,
            'name' => $this->requestData['name'],
        ];

        $this->path = '/project/' . $this->projectId;
    }

    public function testPutProjectSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'A Project with projectId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful PUT request to /project/{projectId}');

        $this->beginTest();
    }

    public function testPutProjectUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized PUT request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutProjectForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden PUT request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutProjectNotFound(): void
    {
        // Path with projectId for non existent project
        $this->projectId = $this->projectIdInvalid;
        $this->path = '/project/' . $this->projectId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A project with projectId does not exist'
            )
            ->uponReceiving('Not Found PUT request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutProjectBadRequest(): void
    {
        // name is not defined
        $this->requestData['name'] = '';

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad PUT request to /project/{projectId}');

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

        return $client->putProject($this->projectId, Client::FETCH_RESPONSE);
    }
}
