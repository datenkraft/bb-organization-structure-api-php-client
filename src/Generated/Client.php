<?php

namespace Datenkraft\Backbone\Client\OrganizationStructureApi\Generated;

class Client extends \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Runtime\Client\Client
{
    /**
     * Delete a Project by projectId
     *
     * @param string $projectId Project Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function deleteProject(string $projectId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\DeleteProject($projectId), $fetch);
    }
    /**
     * Get a Project by projectId
     *
     * @param string $projectId Project Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getProject(string $projectId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetProject($projectId), $fetch);
    }
    /**
     * Put a Project by projectId
     *
     * @param string $projectId Project Id
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutProjectUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutProjectForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutProjectUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutProjectBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutProjectNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutProjectInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function putProject(string $projectId, \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PutProject($projectId, $requestBody), $fetch);
    }
    /**
     * Get a list of Projects
     *
     * @param array $queryParameters {
     *     @var string $filter[accountingProfileId] Accounting Profile Id filter
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectCollection(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetProjectCollection($queryParameters), $fetch);
    }
    /**
     * Post a new Project
     *
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postProject(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProject $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PostProject($requestBody), $fetch);
    }
    /**
     * Delete an Identity by identityId
     *
     * @param string $identityId Identity Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteIdentityInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function deleteIdentity(string $identityId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\DeleteIdentity($identityId), $fetch);
    }
    /**
     * Get an Identity by identityId
     *
     * @param string $identityId Identity Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Identity|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getIdentity(string $identityId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetIdentity($identityId), $fetch);
    }
    /**
     * Put an Identity by identityId
     *
     * @param string $identityId Identity Id
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutIdentityUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutIdentityForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutIdentityUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutIdentityBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutIdentityNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutIdentityConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutIdentityInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Identity|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function putIdentity(string $identityId, \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PutIdentity($identityId, $requestBody), $fetch);
    }
    /**
     * Get a list of Identities
     *
     * @param array $queryParameters {
     *     @var string $filter[email] Email filter
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Identity[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getIdentityCollection(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetIdentityCollection($queryParameters), $fetch);
    }
    /**
     * Post a new Identity
     *
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostIdentityUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostIdentityForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostIdentityUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostIdentityBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostIdentityConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostIdentityInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Identity|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postIdentity(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewIdentity $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PostIdentity($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityProjectCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityProjectCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetIdentityProjectCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\IdentityProject[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getIdentityProjectCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetIdentityProjectCollection(), $fetch);
    }
    /**
     * Delete a Customer
     *
     * @param string $customerId Customer Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteCustomerInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function deleteCustomer(string $customerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\DeleteCustomer($customerId), $fetch);
    }
    /**
     * Get a Customer by customerId
     *
     * @param string $customerId Customer Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetCustomerUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetCustomerForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetCustomerNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetCustomerBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetCustomerInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Customer|\Psr\Http\Message\ResponseInterface
     */
    public function getCustomer(string $customerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetCustomer($customerId), $fetch);
    }
    /**
     * Update a Customer
     *
     * @param string $customerId Customer Id
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutCustomerUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutCustomerForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutCustomerUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutCustomerNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutCustomerBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PutCustomerInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Customer|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function putCustomer(string $customerId, \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PutCustomer($customerId, $requestBody), $fetch);
    }
    /**
     * Add a new Customer
     *
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostCustomerUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostCustomerForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostCustomerUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostCustomerBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostCustomerInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Customer|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postCustomer(\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewCustomer $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PostCustomer($requestBody), $fetch);
    }
    /**
     * Get an Organization by organizationId
     *
     * @param string $organizationId Organization Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetOrganizationUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetOrganizationForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetOrganizationNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetOrganizationBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetOrganizationInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Organization|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getOrganization(string $organizationId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetOrganization($organizationId), $fetch);
    }
    /**
     * Get ProjectSku relations for a Project.
     *
     * @param string $projectId Project Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuCollectionNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ProjectSku[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectSkuCollection(string $projectId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetProjectSkuCollection($projectId), $fetch);
    }
    /**
     * Post new ProjectSku relations
     *
     * @param string $projectId Project Id
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\NewProjectSku[] $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostProjectSkuCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\Project|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postProjectSkuCollection(string $projectId, array $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PostProjectSkuCollection($projectId, $requestBody), $fetch);
    }
    /**
     * Delete a ProjectSku relation
     *
     * @param string $projectId Project Id
     * @param string $skuCode Sku Code
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectSkuUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectSkuForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectSkuNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectSkuBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteProjectSkuInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function deleteProjectSku(string $projectId, string $skuCode, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\DeleteProjectSku($projectId, $skuCode), $fetch);
    }
    /**
     * Get ProjectSku relation entity.
     *
     * @param string $projectId Project Id
     * @param string $skuCode Sku Code
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetProjectSkuInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ProjectSku|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectSku(string $projectId, string $skuCode, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetProjectSku($projectId, $skuCode), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetAuthRoleCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetAuthRoleCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetAuthRoleCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleResource[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getAuthRoleCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetAuthRoleCollection(), $fetch);
    }
    /**
     * Delete one or more role to identity assignments in this resource server
     *
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityResource[] $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteAuthRoleIdentityCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteAuthRoleIdentityCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteAuthRoleIdentityCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteAuthRoleIdentityCollectionNotFoundException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteAuthRoleIdentityCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\DeleteAuthRoleIdentityCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function deleteAuthRoleIdentityCollection(array $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\DeleteAuthRoleIdentityCollection($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetAuthRoleIdentityCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetAuthRoleIdentityCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\GetAuthRoleIdentityCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityResource[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getAuthRoleIdentityCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetAuthRoleIdentityCollection(), $fetch);
    }
    /**
     * Create one or more role to identity assignments in this resource server
     *
     * @param \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityResource[] $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostAuthRoleIdentityCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostAuthRoleIdentityCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostAuthRoleIdentityCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostAuthRoleIdentityCollectionConflictException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostAuthRoleIdentityCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\PostAuthRoleIdentityCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\AuthRoleIdentityResource[]|\Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postAuthRoleIdentityCollection(array $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\PostAuthRoleIdentityCollection($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getOpenApi(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetOpenApi(), $fetch);
    }
    /**
     * Get the openapi documentation in the specified format (yaml or json, fallback is json)
     *
     * @param string $format Openapi file format
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getOpenApiInFormat(string $format, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Endpoint\GetOpenApiInFormat($format), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://organization-structure.conqore.niceshops.com/v1');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer(array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Datenkraft\Backbone\Client\OrganizationStructureApi\Generated\Normalizer\JaneObjectNormalizer()), array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}