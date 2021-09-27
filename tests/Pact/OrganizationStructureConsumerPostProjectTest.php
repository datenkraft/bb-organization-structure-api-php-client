<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerPostProjectTest
 * @package Pact
 */
class OrganizationStructureConsumerPostProjectTest extends OrganizationStructureConsumerTest
{
    protected string $projectId;
    protected string $customerId;
    protected string $accountingProfileId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->projectId = 'b9c8d37b-04b8-4be6-9c77-e960ee8f32b6';

        $this->customerId = 'fb73d11a-3bc7-40b8-86e0-c8c60f89741f';
        $this->accountingProfileId = 'c4f96d2a-eee7-437f-bf78-622d8a1ae820';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = ['Content-Type' => 'application/json'];

        $this->requestData = [
            'customerId' => $this->customerId,
            'name' => 'Project Name',
            'accountingProfileId' => $this->accountingProfileId,
        ];
        $this->responseData = [
            'projectId' => $this->matcher->uuid(),
            'customerId' => $this->customerId,
            'name' => $this->requestData['name'],
            'accountingProfileId' => $this->accountingProfileId,
        ];

        $this->path = '/project';
    }

    public function testPostProjectSuccess(): void
    {
        $this->expectedStatusCode = '201';

        $this->builder
            ->given('The request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful POST request to /project');

        $this->beginTest();
    }

    public function testPostProjectUnprocessableCustomerId(): void
    {
        // A Customer with customerId does not exist
        $this->customerId = 'da2808e2-06f9-49c2-877b-b5361074a639';
        $this->requestData['customerId'] = $this->customerId;

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('A Customer with the customerId in the request does not exist')
            ->uponReceiving('Unprocessable POST request to /project with invalid customerId');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectUnprocessableAccountingProfileId(): void
    {
        // An Accounting Profile with accountingProfileId does not exist
        $this->accountingProfileId = '43360eca-68ec-4c19-8103-83d275587ff6';
        $this->requestData['accountingProfileId'] = $this->accountingProfileId;

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('An Accounting Profile with the accountingProfileId in the request does not exist')
            ->uponReceiving('Unprocessable POST request to /project with invalid accountingProfileId');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /project');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden POST request to /project');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostProjectBadRequest(): void
    {
        // Name is not defined
        $this->requestData['name'] = '';

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /project');

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

        $project = (new NewProject())
            ->setCustomerId($this->requestData['customerId'])
            ->setName($this->requestData['name'])
            ->setAccountingProfileId($this->requestData['accountingProfileId']);

        return $client->postProject($project, Client::FETCH_RESPONSE);
    }
}
