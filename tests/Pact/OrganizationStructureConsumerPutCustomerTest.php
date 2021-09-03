<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerPutCustomerTest
 * @package Pact
 */
class OrganizationStructureConsumerPutCustomerTest extends OrganizationStructureConsumerTest
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

        $this->method = 'PUT';

        $this->token = getenv('VALID_TOKEN_CUSTOMER_PUT');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->customerIdValid = 'cf80dd9e-bdac-4868-a516-794eff41d395';
        $this->customerIdInvalid = '846d7258-345f-4223-b048-55e7c6390432';

        $this->customerId = $this->customerIdValid;

        $this->organizationId = 'cc5f684f-1a11-4d28-b226-09ef42f91ab8';

        $this->requestData = [
            'organizationId' => $this->organizationId,
            'name' => 'Customer Name'
        ];
        $this->responseData = [
            'customerId' => $this->customerId,
            'organizationId' => $this->organizationId,
            'name' => $this->requestData['name'],
        ];

        $this->path = '/customer/' . $this->customerId;
    }

    public function testPutCustomerSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A Customer with customerId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful PUT request to /customer/{customerId}');

        $this->beginTest();
    }

    public function testPutCustomerUnprocessable(): void
    {
        // Organization with organizationId does not exist
        $this->organizationId = 'dc141a33-2a29-4468-80a1-6f021022f93f';
        $this->requestData['organizationId'] = $this->organizationId;

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('An Organization with organizationId does not exist')
            ->uponReceiving('Unprocessable PUT request to /customer');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutCustomerUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized PUT request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutCustomerForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden PUT request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutCustomerNotFound(): void
    {
        // Customer with customerId does not exist
        $this->customerId = $this->customerIdInvalid;
        $this->path = '/customer/' . $this->customerId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Customer with customerId does not exist')
            ->uponReceiving('Not Found PUT request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutCustomerBadRequest(): void
    {
        // Name is not defined
        $this->requestData['name'] = '';

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad PUT request to /customer/{customerId}');

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

        $customer = (new NewCustomer())
            ->setOrganizationId($this->requestData['organizationId'])
            ->setName($this->requestData['name']);

        return $client->putCustomer($this->customerId, $customer, Client::FETCH_RESPONSE);
    }
}
