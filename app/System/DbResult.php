<?php
namespace App\System;

class DbResult
{
  private \mysqli_result $hresult;

  public function __construct(\mysqli_result $hresult)
  {
    $this->hresult = $hresult;
  }

  public function fetchAll()
  {
    return $this->hresult->fetch_all(MYSQLI_ASSOC);
  }

  public function fetch() {
    return $this->hresult->fetch_array(MYSQLI_ASSOC);
  }
}