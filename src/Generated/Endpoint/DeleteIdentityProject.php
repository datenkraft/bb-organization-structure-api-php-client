<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint;

class DeleteIdentityProject extends \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\Endpoint
{
    /**
     * Delete Identity to Project relations
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityProject[] $requestBody
     */
    public function __construct(array $requestBody)
    {
        $this->body = $requestBody;
    }
    use \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return '/identity-project';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (is_array($this->body) and isset($this->body[0]) and $this->body[0] instanceof \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityProject) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectInternalServerErrorException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectBadRequestException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectUnauthorizedException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectForbiddenException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (422 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectUnprocessableEntityException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityProjectInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if (mb_strpos(strtolower($contentType), 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes(): array
    {
        return ['oAuthAuthorization', 'bearerAuth'];
    }
}