<?php
namespace App\System;

use App\Kernel;

class Db
{
  private $handle;

  public function __construct()
  {
    $config = Kernel::getInstance()->getParam('database');

    $this->handle = mysqli_connect($config['hostname'], $config['username'],
      $config['password'], $config['database']);
  }

  public function query(string $sql)
  {
    return mysqli_query($this->handle, $sql);
  }

  public function get(string $sql): DbResult
  {
    return new DbResult($this->query($sql));
  }
}