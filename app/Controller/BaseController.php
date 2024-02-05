<?php
namespace App\Controller;

use App\Kernel;
use App\System\Security;
use App\System\Db;
use App\System\Template;
use App\System\Container;
use App\System\Request;
use App\System\Response;

class BaseController
{
  protected $protected = false;

  protected Db $db;

  protected Request $request;

  protected Template $template;

  protected Security $security;

  public function __construct()
  {
    $this->request = Container::getInstance()->get('request');
    $this->db = Container::getInstance()->get('db');
    $this->template = Container::getInstance()->get('template');
    $this->security = Container::getInstance()->get('security');

    if ($this->protected && !$this->security->isAuthorized())
    {
      $securityConfig = Kernel::getInstance()->getParam('security');

      (new Response())
        ->redirect($securityConfig['login'])
        ->write();

      exit();
    }
  }
}