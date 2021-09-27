<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerPostCustomerTest
 * @package Pact
 */
class OrganizationStructureConsumerPostCustomerTest extends OrganizationStructureConsumerTest
{
    protected array $customerId;

    protected string $organizationId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->customerId = $this->matcher->uuid();

        $this->organizationId = 'cc5f684f-1a11-4d28-b226-09ef42f91ab8';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = ['Content-Type' => 'application/json'];

        $this->requestData = [
            'organizationId' => $this->organizationId,
            'name' => 'Customer Name'
        ];
        $this->responseData = [
            'customerId' => $this->customerId,
            'organizationId' => $this->organizationId,
            'name' => $this->requestData['name'],
        ];

        $this->path = '/customer';
    }

    public function testPostCustomerSuccess(): void
    {
        $this->expectedStatusCode = '201';

        $this->builder
            ->given('The request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful POST request to /customer');

        $this->beginTest();
    }

    public function testPostCustomerUnprocessable(): void
    {
        // Organization with organizationId does not exist
        $this->organizationId = 'dc141a33-2a29-4468-80a1-6f021022f93f';
        $this->requestData['organizationId'] = $this->organizationId;

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('An Organization with organizationId does not exist')
            ->uponReceiving('Unprocessable POST request to /customer');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostCustomerUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /customer');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostCustomerForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden POST request to /customer');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostCustomerBadRequest(): void
    {
        // Name is not defined
        $this->requestData['name'] = '';

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /customer');

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

        $customer = (new newCustomer())
            ->setOrganizationId($this->requestData['organizationId'])
            ->setName($this->requestData['name']);

        return $client->postCustomer($customer, Client::FETCH_RESPONSE);
    }
}
