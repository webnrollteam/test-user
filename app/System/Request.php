<?php
namespace App\System;

class Request
{
  public function get($name)
  {
    return $this->xssClean($_GET[$name] ?? $_POST[$name]);
  }

  public function getMethod()
  {
    return $_SERVER['REQUEST_METHOD'];
  }

  private function xssClean($data)
  {
    $data = rawurldecode($data);
    return filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);
  }
}