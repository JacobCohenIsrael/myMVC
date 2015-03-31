<?php
namespace JacobCohenIsrael\MyMVC\Application;

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
        $route  = $this->sm->router()->route();
        $ctrl   = $route->getController();
        $action = $route->getAction();
        $controller = new $ctrl(); // Initiate instance by controller name;
        $controller->$action(); // Initiate the action
    }
}

