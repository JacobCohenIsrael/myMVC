<?php
namespace JacobCohenIsrael\MyMVC\Route;

use JacobCohenIsrael\MyMVC\Http\Request;
use JacobCohenIsrael\MyMVC\Route\Route;
use JacobCohenIsrael\MyMVC\Application\Exception\RouteException;
class Router
{
    /**
     * @var Request
     */
    private $request;
    
    /**
     * @var array
     */
    private $routes;
    
    /**
     * @var Route
     */
    private $route;
    
    
    /**
     * @param Request $request
     * @param array $routes
     */
    public function __construct(Request $request, $routes)
    {
        $this->request  = $request;
        $this->routes   = $routes;
        $this->route    = null;
    }
    
    /**
     * @return Route
     */
    public function route()
    {
        if ($this->route)
        {
            return $this->route;
        }
        
        $path = $this->request->path();
        
        if (!isset($this->routes[$path]))
        {
            throw new RouteException("Invalid route '$path'");
        }

        $route = $this->routes[$path];
        
        $ctrl   = (isset($route['controller'])) ? $route['controller']  : null;
        $action = (isset($route['action']))     ? $route['action']      : null;
        $di     = (isset($route['di']))         ? $route['di']          : [];
        
        
        return new Route($ctrl, $action, $di);
    }
    
    /**
     * @param Route $route
     * @return Router
     */
    public function setRoute(Route $route)
    {
        $this->route = $route;
        return $this;
    }
}