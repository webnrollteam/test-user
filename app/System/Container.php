<?php
namespace App\System;

class Container
{
  private array $instances = [];

  private static $instance = null;

  public static function getInstance()
  {
    if (!self::$instance)
    {
      self::$instance = new Container();
    }

    return self::$instance;
  }

  public function set(string $name, $obj)
  {
    $this->instances[$name] = $obj;
  }

  public function get(string $name)
  {
    return isset($this->instances[$name]) ? $this->instances[$name] : null;
  }
}