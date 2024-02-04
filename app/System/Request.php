<?php
namespace App\System;

class Request
{
  public function get($name)
  {
    return $this->xssClean($_GET[$name] ?? $_POST[$name]);
  }

  private function xssClean($data)
  {
    $data = rawurldecode($data);
    return filter_var($data, FILTER_SANITIZE_SPEC_CHARS);
  }
}