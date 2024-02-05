<?php
namespace App\Controller;

class HomeController extends BaseController
{
  public function index()
  {
    return $this->template
      ->render('home', []);
  }
}