<?php

namespace App\Traits;

trait Authenticatable
{
    protected $middlewares = [];

    protected function middleware(string $middleware, array $routes): void{
        if(!array_key_exists($middleware, $this->middlewares)){
            $this->middlewares[] = $middleware;
            $this->middlewares[$middleware] = $routes;
        }
    }

    public function getMiddlewares(): array{
        return $this->middlewares;
    }
}