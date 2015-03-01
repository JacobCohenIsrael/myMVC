<?php
use App\Http\Request;
define('APP_ENV',       'development');
define('APP_ROOT_PATH', realpath(__DIR__ . '/../'));

require_once APP_ROOT_PATH . '/module/App/src/App/Http/Request.php';

$request = new Request();

$path = $request->path();

// So now we have a path, let's do something about it
// But first let's create a configuration array

$conf = [
    '/' => [
        'action' => 'index',
        'controller'    => 'App\\Controller\\DefaultController',
        'di' => '',
    ],  
    '/test' => [
        'action' => 'index',
        'controller' => 'App\\Controller\\TestController',
        'di' => '',
    ],  
    '/test/something' => [
        'action' => 'something',
        'controller' => 'App\\Controller\\TestController',
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
$pathToController  = str_replace('\\', '/', $config['controller']);
require_once APP_ROOT_PATH . '/module/App/src/' . $pathToController . '.php'; // Include the controller
$controller = new $config['controller'](); // Initiate instance by controller name;
$controller->$config['action'](); // Initiate the action

