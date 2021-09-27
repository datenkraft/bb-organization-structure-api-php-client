<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity;
use Exception;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerPutIdentityTest
 * @package Pact
 */
class OrganizationStructureConsumerPutIdentityTest extends OrganizationStructureConsumerTest
{
    protected string $identityId;
    protected string $identityIdValid;
    protected string $identityIdInvalid;

    protected string $customerId;

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

        $this->identityIdValid = 'f95b534f-1b81-4daa-8bc5-66335bafa703';
        $this->identityIdInvalid = '19aaa937-9c07-4a91-a99e-405dfdf4161f';

        $this->identityId = $this->identityIdValid;

        $this->customerId = 'fb73d11a-3bc7-40b8-86e0-c8c60f89741f';

        $this->requestData = [
            'email' => 'identity@test_put.com',
            'customerId' => $this->customerId
        ];
        $this->responseData = [
            'identityId' => $this->identityId,
            'email' => $this->requestData['email'],
            'customerId' => $this->customerId
        ];

        $this->path = '/identity/' . $this->identityId;
    }

    public function testPutIdentitySuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A Identity with identityId exists, the request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful PUT request to /identity/{identityId}');

        $this->beginTest();
    }

    public function testPutIdentityUnprocessable(): void
    {
        // Customer with customerId does not exist
        $this->customerId = 'dc141a33-2a29-4468-80a1-6f021022f93f';
        $this->requestData['customerId'] = $this->customerId;

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('A Customer with customerId does not exist')
            ->uponReceiving('Unprocessable PUT request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutIdentityUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized PUT request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutIdentityForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden PUT request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutIdentityNotFound(): void
    {
        // Identity with identityId does not exist
        $this->identityId = $this->identityIdInvalid;
        $this->path = '/identity/' . $this->identityId;

        // Unique email
        $this->requestData['email'] = 'identity@test_put_2.com';

        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Identity with identityId does not exist')
            ->uponReceiving('Not Found PUT request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutIdentityBadRequest(): void
    {
        // Email is not defined
        $this->requestData['email'] = '';

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad PUT request to /identity/{identityId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPutIdentityConflict(): void
    {
        // An Identity with email already exists
        $this->requestData['email'] = 'identity@test.com';

        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0] = [
            'code' => strval($this->expectedStatusCode),
            'message' => $this->matcher->like('Example error message'),
            'extra' => [
                'identities' => [
                    [
                        'identityId' => $this->matcher->uuid(),
                        'email' => $this->requestData['email'],
                        'customerId' => $this->matcher->uuid(),
                    ]
                ],
            ]
        ];

        $this->builder
            ->given('An Identity with email already exists')
            ->uponReceiving('Conflicted PUT request to /identity');

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

        $identity = (new NewIdentity())
            ->setEmail($this->requestData['email'])
            ->setCustomerId($this->requestData['customerId']);

        return $client->putIdentity($this->identityId, $identity, Client::FETCH_RESPONSE);
    }
}
