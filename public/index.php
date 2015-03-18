<?php
use JacobCohenIsrael\MyMVC\Http\Request;

define('APP_ENV',       'development');
define('APP_ROOT_PATH', realpath(__DIR__ . '/../'));

require_once APP_ROOT_PATH . '/vendor/autoload.php';

$request = new Request();

$path = $request->path();

// So now we have a path, let's do something about it
// But first let's create a configuration array

$conf = [
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
];

// Notice how each key in the conf is the actual path
// Now all we need to do is pick it and use it to load the right controller, and activate the right action
if(!array_key_exists($path, $conf))
{
    die("Path does not exist");
}
$config = $conf[$path];
$controller = new $config['controller'](); // Initiate instance by controller name;
$controller->$config['action'](); // Initiate the action

