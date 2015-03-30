<?php
namespace JacobCohenIsrael\MyMVC\Application;

use JacobCohenIsrael\MyMVC\Application\Exception\RouteException;

class Application
{
    /**
     * @var ServiceManager
     */
    protected $sm;
    
    public function __construct(ServiceManager $sm)
    {
        $this->sm = $sm;
    }
    
    public static function run($sm)
    {
        (new Application($sm))->start();
    }
    
    protected function start()
    {
        // Get the path by the request
        $path = $this->sm->getRequest()->path();
                
        // Get configuration from the Service Manager
        $conf = $this->sm->getConfRoutes();
        
        // Notice how each key in the conf is the actual path
        // Now all we need to do is pick it and use it to load the right controller, and activate the right action
        if(!array_key_exists($path, $conf))
        {
            throw new RouteException('Invalid Route', 500);
        }
        $config = $conf[$path];
        $controller = new $config['controller'](); // Initiate instance by controller name;
        $controller->$config['action'](); // Initiate the action
    }
}

