<?php
namespace DaiDP\TenantManagement;

/**
 * Interface TenantManagementInterface
 * @package DaiDP\TenantManagement
 * @author DaiDP
 * @since Sep, 2019
 */
interface TenantManagementInterface
{
    /**
     * Get list connection string
     *
     * @param $serviceName
     * @return mixed
     */
    public function getConnectionStrings($serviceName);

    /**
     * Create tenant
     *
     * @param $name
     * @return mixed
     */
    public function createTenant($name);

    /**
     * Create connection string for tenant
     *
     * @param $idTenant
     * @param $connectionString
     * @param string $domain
     * @param string $service
     * @return mixed
     */
    public function createConnectionString($idTenant, $connectionString, $domain = 'mys', $service = 'brand');
}