<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerGetCustomerTest
 * @package Pact
 */
class OrganizationStructureConsumerGetCustomerTest extends OrganizationStructureConsumerTest
{
    protected string $customerId;
    protected string $customerIdValid;
    protected string $customerIdInvalid;

    protected string $organizationId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('CONTRACT_TEST_CLIENT_TOKEN');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->customerIdValid = 'df663fea-ebf1-45eb-b896-d124713f220e';
        $this->customerIdInvalid = '846d7258-345f-4223-b048-55e7c6390432';

        $this->customerId = $this->customerIdValid;

        $this->organizationId = 'cc5f684f-1a11-4d28-b226-09ef42f91ab8';

        $this->requestData = [];
        $this->responseData = [
            'customerId' => $this->customerId,
            'organizationId' => $this->organizationId,
            'name' => 'Customer Test Get'
        ];

        $this->path = '/customer/' . $this->customerId;
    }

    public function testGetCustomerSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A Customer with customerId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful GET request to /customer/{customerId}');

        $this->beginTest();
    }

    public function testGetCustomerUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetCustomerForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden GET request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetCustomerNotFound(): void
    {
        // Customer with customerId does not exist
        $this->customerId = $this->customerIdInvalid;
        $this->path = '/customer/' . $this->customerId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Customer with customerId does not exist')
            ->uponReceiving('Not Found GET request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetCustomerBadRequest(): void
    {
        // CustomerId is not a valid uuid
        $this->customerId = 'non_uuid';
        $this->path = '/customer/' . $this->customerId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The customerId in the request is invalid')
            ->uponReceiving('Bad GET request to /customer/{customerId}');

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

        return $client->getCustomer($this->customerId, Client::FETCH_RESPONSE);
    }
}
