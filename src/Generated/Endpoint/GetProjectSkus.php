<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint;

class GetProjectSkus extends \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\Endpoint
{
    protected $projectId;
    /**
     * Get SKU Id’s from project with the projectId.
     *
     * @param string $projectId Project Id
     */
    public function __construct(string $projectId)
    {
        $this->projectId = $projectId;
    }
    use \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{projectId}'), array($this->projectId), '/project/{projectId}/sku');
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
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkusUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkusForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkusNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ProjectSku[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ProjectSku[]', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkusUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkusForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkusNotFoundException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\OrganizationStructureApi\\Generated\\Model\\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array('oAuthAuthorization');
    }
}