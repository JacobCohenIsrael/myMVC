<?php
namespace JacobCohenIsrael\MyMVC\Application;

use JacobCohenIsrael\MyMVC\Http\Request;

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
        $request = new Request();
        
        $path = $request->path();
        
        // So now we have a path, let's do something about it
        // But first let's ask for the configuration from the Service Manager
        
        $conf = $this->sm->getConfRoutes();
        
        // Notice how each key in the conf is the actual path
        // Now all we need to do is pick it and use it to load the right controller, and activate the right action
        if(!array_key_exists($path, $conf))
        {
            die("Path does not exist");
        }
        $config = $conf[$path];
        $controller = new $config['controller'](); // Initiate instance by controller name;
        $controller->$config['action'](); // Initiate the action
    }
}

