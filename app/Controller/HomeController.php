<?php
namespace App\Controller;

use App\System\Container;

class HomeController
{
  public function index()
  {
    return Container::getInstance()
      ->get('template')
      ->render('home', []);
  }
}