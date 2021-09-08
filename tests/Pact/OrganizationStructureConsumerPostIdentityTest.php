<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Client;
use Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OrganizationStructureConsumerPostIdentityTest
 * @package Pact
 */
class OrganizationStructureConsumerPostIdentityTest extends OrganizationStructureConsumerTest
{
    protected array $identityId;

    protected string $customerId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->token = getenv('VALID_TOKEN_IDENTITY_POST');

        $this->identityId = $this->matcher->uuid();

        $this->customerId = 'fb73d11a-3bc7-40b8-86e0-c8c60f89741f';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = ['Content-Type' => 'application/json'];

        $this->requestData = [
            'email' => 'identity@test_post.com',
            'customerId' => $this->customerId,
        ];
        $this->responseData = [
            'identityId' => $this->identityId,
            'email' => $this->requestData['email'],
            'customerId' => $this->customerId,
        ];

        $this->path = '/identity';
    }

    public function testPostIdentitySuccess(): void
    {
        $this->expectedStatusCode = '201';

        $this->builder
            ->given('The request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful POST request to /identity');

        $this->beginTest();
    }

    public function testPostIdentityUnprocessable(): void
    {
        // Customer with customerId does not exist
        $this->customerId = 'dc141a33-2a29-4468-80a1-6f021022f93f';
        $this->requestData['customerId'] = $this->customerId;

        // Unique email
        $this->requestData['email'] = 'identity@test_post_2.com';

        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = '422';
        $this->builder
            ->given('A Customer with customerId does not exist')
            ->uponReceiving('Unprocessable POST request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostIdentityUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostIdentityForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token has an invalid scope')
            ->uponReceiving('Forbidden POST request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostIdentityBadRequest(): void
    {
        // Email is not defined
        $this->requestData['email'] = '';

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /identity');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPostIdentityConflict(): void
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
            ->uponReceiving('Conflicted POST request to /identity');

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

        return $client->postIdentity($identity, Client::FETCH_RESPONSE);
    }
}
