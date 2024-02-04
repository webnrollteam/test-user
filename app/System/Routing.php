<?php
namespace App\System;

class Routing
{
  private $routes = [];

  public function post($route, $handler)
  {
    $this->routes[] = [
      'route' => $route,
      'method' => 'POST',
      'handler' => $handler
    ];
  }

  public function get($route, $handler)
  {
    $this->routes[] = [
      'route' => $route,
      'method' => 'GET',
      'handler' => $handler
    ];
  }

  public function match($url)
  {
    $method = strtoupper($_SERVER['REQUEST_METHOD']);

    foreach ($this->routes as $route)
    {
      if ($method == $route['method'] && preg_match($route['route'], $url, $matches))
      {
        return [
          'route' => $route,
          'matches' => $matches,
        ];
      }
    }

    return null;
  }
}