<?php
namespace JacobCohenIsrael\MyMVC\Application;

use JacobCohenIsrael\MyMVC\Http\Request;
class ServiceManager
{
    const CONF_ROUTE    = 'route';
    
    /**
     * Internal cache
     * @var array
     */
    protected $cache = [];
    
    /**
     * ServiceManager configuration
     * @var array
    */
    protected $config = [
        'route' => [
            '/' => [
                'action' => 'index',
                'controller'    => 'JacobCohenIsrael\\MyMVC\\Controller\\DefaultController',
                'di' => '',
            ],
            '/test' => [
                'action' => 'index',
                'controller' => 'JacobCohenIsrael\\MyMVC\\Controller\\TestController',
                'di' => '',
            ],
            '/test/something' => [
                'action' => 'something',
                'controller' => 'JacobCohenIsrael\\MyMVC\\Controller\\TestController',
                'di' => '',
            ],
        ]
    ];
    
    
    /**
     * @param array $configuration
    */
    public function __construct(array $configuration = [])
    {
        $this->config = array_merge($this->config, $configuration);
    }
    
    /**
     * @return array
     */
    public function getConf($segment = null)
    {
        if ($segment)
        {
            return (isset($this->config[$segment])) ? $this->config[$segment] : [];
        }
        return $this->config;
    }
    
    /**
     * @return array
     */
    public function getConfRoutes()
    {
        return $this->getConf(ServiceManager::CONF_ROUTE);
    }
    
    /**
     * @return Request
     */
    public function getRequest()
    {
        if (!isset($this->cache['request']))
        {
            $this->cache['request'] = new Request();
        }
        return $this->cache['request'];
    }
}
