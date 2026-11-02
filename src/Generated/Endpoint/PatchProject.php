<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint;

class PatchProject extends \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\Endpoint
{
    protected $projectId;
    /**
     * Update one or more fields of a Project
     * @param string $projectId Project Id
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject $requestBody
     */
    public function __construct(string $projectId, \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject $requestBody)
    {
        $this->projectId = $projectId;
        $this->body = $requestBody;
    }
    use \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'PATCH';
    }
    public function getUri(): string
    {
        return str_replace(['{projectId}'], [rawurlencode($this->projectId)], '/project/{projectId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer): array
    {
        if ($this->body instanceof \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject) {
            return [['Content-Type' => ['application/json']], \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\JsonPayload::encode($serializer, $this->body)];
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
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Symfony\Contracts\HttpClient\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getContent(false);
        if ($contentType !== null && (200 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project', 'json');
        }
        if ($contentType !== null && (400 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectBadRequestException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectUnauthorizedException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectForbiddenException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (404 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectNotFoundException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (422 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectUnprocessableEntityException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (500 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PatchProjectInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse', 'json'), $response);
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