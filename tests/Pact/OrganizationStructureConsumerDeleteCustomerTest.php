<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerDeleteCustomerTest
 * @package Pact
 */
class OrganizationStructureConsumerDeleteCustomerTest extends OrganizationStructureConsumerTest
{
    protected string $customerId;
    protected string $customerIdValid;
    protected string $customerIdInvalid;
    protected string $customerIdAssigned;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'DELETE';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [];

        $this->customerIdValid = 'a4a6af86-089d-45cd-b801-040585c798ef';
        $this->customerIdInvalid = '846d7258-345f-4223-b048-55e7c6390432';
        $this->customerIdAssigned = 'ba5aa020-ae76-4d45-96a1-ef1654506ae7';

        $this->customerId = $this->customerIdValid;

        $this->requestData = [];
        $this->responseData = null;

        $this->path = '/customer/' . $this->customerId;
    }

    public function testDeleteCustomerSuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given('A Customer with customerId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful DELETE request to /customer/{customerId}');

        $this->beginTest();
    }

    public function testDeleteCustomerUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized DELETE request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteCustomerForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden DELETE request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteCustomerNotFound(): void
    {
        // Customer with customerId does not exist
        $this->customerId = $this->customerIdInvalid;
        $this->path = '/customer/' . $this->customerId;

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Customer with customerId does not exist')
            ->uponReceiving('Not Found DELETE request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testDeleteCustomerConflict(): void
    {
        // Customer with customerId is assigned to a Project and an Identity
        $this->customerId = $this->customerIdAssigned;
        $this->path = '/customer/' . $this->customerIdAssigned;

        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0] = [
            'code' => strval($this->expectedStatusCode),
            'message' => $this->matcher->like('Example error message'),
            'extra' => [
                'projects' => [
                    [
                        'projectId' => $this->matcher->uuid(),
                        'customerId' => $this->customerIdAssigned,
                        'name' => 'Project Test CustomerAssigned',
                    ]
                ],
            ]
        ];

        $this->errorResponse['errors'][1] = [
            'code' => strval($this->expectedStatusCode),
            'message' => $this->matcher->like('Example error message'),
            'extra' => [
                'identities' => [
                    [
                        'identityId' => $this->matcher->uuid(),
                        'email' => 'identity@test_customer_assigned.com',
                        'customerId' => $this->customerIdAssigned,
                    ]
                ],
            ]
        ];

        $this->builder
            ->given('A Customer with customerId is assigned to a Project and an Identity')
            ->uponReceiving('Conflicted DELETE request to /customer/{customerId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteCustomerBadRequest(): void
    {
        // CustomerId is not a valid uuid
        $this->customerId = 'non_uuid';
        $this->path = '/customer/' . $this->customerId;

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The customerId in the request is invalid')
            ->uponReceiving('Bad DELETE request to /customer/{customerId}');

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

        return $client->deleteCustomer($this->customerId, Client::FETCH_RESPONSE);
    }
}
