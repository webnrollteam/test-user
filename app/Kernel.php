<?php
namespace App;

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
    echo 'Content';
  }
}