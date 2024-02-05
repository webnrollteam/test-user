<?php
namespace App\Controller;

use App\System\Response;

class HomeController extends BaseController
{
  public function index()
  {
    return (new Response())
      ->redirect('/user/');
  }
}