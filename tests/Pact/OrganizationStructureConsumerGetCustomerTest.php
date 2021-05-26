<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
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

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_CUSTOMER_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->customerIdValid = 'customerId_test';
        $this->customerIdInvalid = 'customerId_test_invalid';

        $this->customerId = $this->customerIdValid;

        $this->requestData = [];
        $this->responseData = [
            'customerId' => $this->customerId,
            'name' => 'Customer Test'
        ];

        $this->path = '/customer/' . $this->customerId;
    }

    public function testGetCustomerSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'A Customer with customerId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /customer/{customerId}');

        $this->beginTest();
    }

    public function testGetCustomerUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
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
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_ADD');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetCustomerNotFound(): void
    {
        // Path with customerId for non existent customer
        $this->customerId = $this->customerIdInvalid;
        $this->path = '/customer/' . $this->customerId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A Customer with customerId does not exist'
            )
            ->uponReceiving('Not Found GET request to /customer/{customerId}');

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
