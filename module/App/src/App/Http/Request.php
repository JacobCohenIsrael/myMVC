<?php
namespace App\Http;

class Request
{
    const METHOD_GET    = 'GET';
    const METHOD_POST   = 'POST';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PUT    = 'PUT';
    
    public function __construct()
    {
    }
    
    /**
     * @return string
     */
    public function path()
    {
        if (isset($_SERVER['REDIRECT_URL']))
        {
            return $_SERVER['REDIRECT_URL'];
        }
        if (isset($_SERVER['REQUEST_URI']))
        {
            return strstr($_SERVER['REQUEST_URI'] . '?', '?', true);
        }
        throw new \Exception('Unable to find path');
    }
}

