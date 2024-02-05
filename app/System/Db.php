<?php
namespace App\System;

use App\Kernel;
use App\System\DbResult;
use mysqli_result;

class Db
{
  private \mysqli $mysqli;

  public function __construct()
  {
    $config = Kernel::getInstance()->getParam('database');

    $this->mysqli = new \mysqli($config['hostname'], $config['username'],
      $config['password'], $config['database']);
  }

  public function query(string $sql, array $params = null): mysqli_result | bool
  {
    if (!$params)
    {
      return $this->mysqli->query($sql);
    }

    $stmt = $this->mysqli->prepare($sql);

    $tmp = [$params[0]];

    for ($i = 1; $i < count($params); $i++)
    {
      $tmp[] = &$params[$i];
    }

    call_user_func_array([$stmt, 'bind_param'], $tmp);
    $stmt->execute();
    return $stmt->get_result();
  }

  public function get(string $sql, array $params = null): DbResult
  {
    return new DbResult($this->query($sql, $params));
  }
}