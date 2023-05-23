<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint;

class DeleteCustomer extends \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\Endpoint
{
    protected $customerId;
    /**
     * Delete a Customer
     *
     * @param string $customerId Customer Id
     */
    public function __construct(string $customerId)
    {
        $this->customerId = $customerId;
    }
    use \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'DELETE';
    }
    public function getUri() : string
    {
        return str_replace(array('{customerId}'), array($this->customerId), '/customer/{customerId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerNotFoundException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerConflictException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\DeleteCustomerConflictErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerBadRequestException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array('oAuthAuthorization', 'bearerAuth');
    }
}