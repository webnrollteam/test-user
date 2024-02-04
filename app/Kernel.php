<?php
namespace App;

use App\System\Container;
use App\System\Request;
use App\System\Response;
use App\System\Routing;

class Kernel
{
  private static $instance;

  public static function getInstance()
  {
    if (!self::$instance)
    {
      self::$instance = new Kernel();
    }

    return self::$instance;
  }

  public function serve()
  {
    $route = Container::getInstance()
      ->get('routing')
      ->match($_SERVER['REQUEST_URI']);

    if ($route)
    {
      $response = $route['route']['handler']($route['matches']);
      if ($response)
      {
        $response->write();
        exit();
      }
    }

    (new Response())
      ->notFound()
      ->write();
  }

  public function buildContainer()
  {
    Container::getInstance()->set('routing', new Routing());
    Container::getInstance()->set('request', new Request());
  }
}