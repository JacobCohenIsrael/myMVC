<?php
namespace JacobCohenIsrael\MyMVC\Route;

class Route
{
    /**
     * @var string
     */
    private $controller;
    
    /**
     * @var string
     */
    private $action;
    
    /**
     * @var array
     */
    private $di;
    
    /**
     * @param string $controller
     * @param string $action
     * @param array $di
     */
    public function __construct($controller, $action, array $di = [])
    {
        $this->controller   = $controller;
        $this->action       = $action;
        $this->di           = $di;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }
    
    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * @return array
     */
    public function getDi()
    {
        return $this->di;
    }
}
