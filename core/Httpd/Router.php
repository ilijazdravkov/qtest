<?php

namespace Core\Httpd;

class Router
{
    protected $routes = ['GET' => [], 'POST' => []];

    public static function load($file){// load the route file and return a new instance of the class
        $router = new static();

        require $file;// load the defined routes

        return $router;
    }

    public function get($uri, $controller){// set GET routes
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller){// set POST routes
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType){// direct the request to the defined controller action in the route
        if(array_key_exists($uri, $this->routes[$requestType])){// if the requested route is defined
            return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));// call the assigned controller action for the requested route
        }

        throw new \Exception('Route not defined');
    }

    protected function callAction($controller, $action){
        $controller = "App\\Controllers\\{$controller}"; // define the Namespace of the controller

        $controller = (new Resolver())->resolve("$controller");// Instantiate new class object with automatic dependency injection

        if(!method_exists($controller, $action)){// check the if the controller method exists
            throw new \Exception("{$controller} action is not defined.");
        }

        return $controller->$action();// call the controller action
    }
}