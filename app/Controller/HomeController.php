<?php
namespace App\Controller;

use App\System\Response;

class HomeController extends BaseController
{
  public function __construct()
  {
    $this->protected = true;
    
    parent::__construct();
  }

  public function index()
  {
    return (new Response())
      ->redirect('/user/');
  }
}