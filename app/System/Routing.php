<?php
namespace App\System;

class Routing
{
  private $routes = [];

  public function post($route, $handler)
  {
    $this->register($route, 'POST', $handler);
  }

  public function get($route, $handler)
  {
    $this->register($route, 'GET', $handler);
  }

  public function put($route, $handler)
  {
    $this->register($route, 'PUT', $handler);
  }

  public function delete($route, $handler)
  {
    $this->register($route, 'DELETE', $handler);
  }

  public function register($route, $method, $handler)
  {
    $this->routes[] = [
      'route' => $route,
      'method' => $method,
      'handler' => $handler
    ];
  }

  public function match()
  {
    $url = $_SERVER['REQUEST_URI'];
    $method = strtoupper($_SERVER['REQUEST_METHOD']);
    
    foreach ($this->routes as $route)
    {
      if ($method == $route['method'] && preg_match($route['route'], $url, $matches))
      {
        return [
          'route' => $route,
          'matches' => array_slice($matches, 1),
        ];
      }
    }

    return null;
  }
}