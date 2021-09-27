<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject;
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
    protected string $customerId;
    protected string $accountingProfileId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'PUT';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->projectIdValid = 'd20c60a6-dffa-482c-8f40-0125636e6550';
        $this->projectIdInvalid = '4cca914e-4b4b-4706-bd7a-2bf2470387e8';

        $this->projectId = $this->projectIdValid;

        $this->customerId = 'fb73d11a-3bc7-40b8-86e0-c8c60f89741f';
        $this->accountingProfileId = 'c4f96d2a-eee7-437f-bf78-622d8a1ae820';

        $this->requestData = [
            'customerId' => $this->customerId,
            'name' => 'Project Name',
            'accountingProfileId' => $this->accountingProfileId,
        ];
        $this->responseData = [
            'projectId' => $this->projectId,
            'customerId' => $this->customerId,
            'name' => $this->requestData['name'],
            'accountingProfileId' => $this->accountingProfileId,
        ];

        $this->path = '/project/' . $this->projectId;
    }

    public function testPutProjectSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A Project with projectId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful PUT request to /project/{projectId}');

        $this->beginTest();
    }

    public function testPutProjectUnprocessableCustomerId(): void
    {
        // A Customer with customerId does not exist
        $this->customerId = 'da2808e2-06f9-49c2-877b-b5361074a639';
        $this->requestData['customerId'] = $this->customerId;

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('A Customer with the customerId in the request does not exist')
            ->uponReceiving('Unprocessable PUT request to /project with invalid customerId');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutProjectUnprocessableAccountingProfileId(): void
    {
        // An Accounting Profile with accountingProfileId does not exist
        $this->accountingProfileId = '43360eca-68ec-4c19-8103-83d275587ff6';
        $this->requestData['accountingProfileId'] = $this->accountingProfileId;

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('An Accounting Profile with the accountingProfileId in the request does not exist')
            ->uponReceiving('Unprocessable PUT request to /project with invalid accountingProfileId');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutProjectUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

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
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden PUT request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutProjectNotFound(): void
    {
        // Project with projectId does not exist
        $this->projectId = $this->projectIdInvalid;
        $this->path = '/project/' . $this->projectId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Project with projectId does not exist')
            ->uponReceiving('Not Found PUT request to /project/{projectId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutProjectBadRequest(): void
    {
        // Name is not defined
        $this->requestData['name'] = '';

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

        $project = (new NewProject())
            ->setCustomerId($this->requestData['customerId'])
            ->setName($this->requestData['name'])
            ->setAccountingProfileId($this->requestData['accountingProfileId']);

        return $client->putProject($this->projectId, $project, Client::FETCH_RESPONSE);
    }
}
