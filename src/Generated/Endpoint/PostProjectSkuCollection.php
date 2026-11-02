<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint;

class PostProjectSkuCollection extends \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\Endpoint
{
    protected $projectId;
    /**
     * Post new ProjectSku relations
     * @param string $projectId Project Id
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProjectSku[] $requestBody
     */
    public function __construct(string $projectId, array $requestBody)
    {
        $this->projectId = $projectId;
        $this->body = $requestBody;
    }
    use \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(['{projectId}'], [rawurlencode($this->projectId)], '/project/{projectId}/sku');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer): array
    {
        if (is_array($this->body) and isset($this->body[0]) and $this->body[0] instanceof \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProjectSku) {
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
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Symfony\Contracts\HttpClient\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getContent(false);
        if ($contentType !== null && (201 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project', 'json');
        }
        if ($contentType !== null && (400 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionBadRequestException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionUnauthorizedException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionForbiddenException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionNotFoundException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (409 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionConflictException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\PostProjectSkuCollectionConflictErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (422 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionUnprocessableEntityException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (500 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if (stripos(strtolower((string) $contentType), 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\BadResponseException($status, $body, $response);
    }
    public function getAuthenticationScopes(): array
    {
        return ['oAuthAuthorization', 'bearerAuth'];
    }
    public function getFetchMode(): string
    {
        return \Jane\Component\OpenApiRuntime\Client\FetchMode::Eager->value;
    }
    public function getTargetClass(): ?string
    {
        return null;
    }
}