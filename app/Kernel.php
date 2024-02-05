<?php
namespace App;

use App\System\Security;
use App\System\Container;
use App\System\Db;
use App\System\Request;
use App\System\Response;
use App\System\Routing;
use App\System\Template;

class Kernel
{
  private static $instance;

  private $config;

  public function __construct()
  {
    $this->config = require(__DIR__ . '/config.php');
  }

  public static function getInstance()
  {
    if (!self::$instance)
    {
      self::$instance = new Kernel();
    }

    return self::$instance;
  }

  public function getParam($name)
  {
    return isset($this->config[$name]) ? $this->config[$name] : null;
  }

  public function serve()
  {
    $route = Container::getInstance()
      ->get('routing')
      ->match();

    if ($route)
    {
      $handler = $route['route']['handler'];
      $controller = new $handler[0];
      $response = call_user_func_array(
        [$controller, $handler[1]], $route['matches']);

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
    session_start();
    
    Container::getInstance()->set('routing', new Routing());
    Container::getInstance()->set('request', new Request());
    Container::getInstance()->set('template', new Template());
    Container::getInstance()->set('db', new Db());
    Container::getInstance()->set('security', new Security());
  }
}