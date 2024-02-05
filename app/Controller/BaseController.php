<?php
namespace App\Controller;

use App\System\Db;
use App\System\Template;
use App\System\Container;

class BaseController
{
  protected Db $db;

  protected Template $template;

  public function __construct()
  {
    $this->db = Container::getInstance()->get('db');
    $this->template = Container::getInstance()->get('template');
  }
}