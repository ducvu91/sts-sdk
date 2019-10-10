<?php
namespace DaiDP\StsSDK\TenantManagement;

use DaiDP\StsSDK\HttpClient\TMClient;

/**
 * Interface TenantManagement
 * @package DaiDP\TenantManagement
 * @author DaiDP
 * @since Sep, 2019
 */
class TenantManagement implements TenantManagementInterface
{
    /**
     * @var TMClient
     */
    protected $client;
    protected $urlVersion = '/api/v1';


    /**
     * TenantManagement constructor.
     */
    public function __construct()
    {
        $this->client = app()->get('daidp.sts.tenant_client');
    }

    /**
     * Get list connection string
     *
     * @param $serviceName
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getConnectionStrings($serviceName = 'RetailProBrand')
    {
        return $this->client->get($this->buildUrl('/tenant-connections/service/' . $serviceName));
    }

    /**
     * Create tenant
     *
     * @param $name
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createTenant($name)
    {
        $data = [
            'name' => $name
        ];

        return $this->client->post($this->buildUrl('/tenants'), $data);
    }

    /**
     * Create connection string for tenant
     *
     * @param $idTenant
     * @param $connectionString
     * @param string $domain
     * @param string $service
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createConnectionString($idTenant, $db_name, $domain = 'RetailPro', $service = 'RetailProBrand')
    {
        $config = $this->config('tenant_management');
        $connectionString = 'Server='.$config['server'].';port='.$config['port'].';Database='.$config['database'].
        $db_name.';user='.$config['user'].';password='.$config['pass'];
        $data = [
            'fk_TenantId' => $idTenant,
            'domain' => $domain,
            'service' => $service,
            'connectionString' => $connectionString
        ];

        return $this->client->post($this->buildUrl('/tenant-connections'), $data);
    }

    /**
     * Build URL
     *
     * @param $url
     * @return string
     */
    protected function buildUrl($url)
    {
        return $this->urlVersion . $url;
    }

    /**
     * Helper to get the config values.
     *
     * @param  string  $key
     * @param  string  $default
     *
     * @return mixed
     */
    protected function config($key, $default = null)
    {
        return config("sts.$key", $default);
    }
}
