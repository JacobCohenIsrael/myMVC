<?php
use JacobCohenIsrael\MyMVC\Application\Application;
use JacobCohenIsrael\MyMVC\Application\ServiceManager;
define('APP_ENV',       'development');
define('APP_ROOT_PATH', realpath(__DIR__ . '/../'));

require_once APP_ROOT_PATH . '/vendor/autoload.php';

Application::run(new ServiceManager());


