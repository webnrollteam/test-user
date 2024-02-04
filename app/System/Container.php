<?php
namespace App\System;

class Container
{
  private $instances = [];

  private static $instance = null;

  public static function getInstance()
  {
    if (!self::$instance)
    {
      self::$instance = new Container();
    }

    return self::$instance;
  }

  public function set($name, $obj)
  {
    $this->instances[$name] = $obj;
  }

  public function get($name)
  {
    return isset($this->instances[$name]) ? $this->instances[$name] : null;
  }
}