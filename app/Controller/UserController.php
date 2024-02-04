<?php
namespace App\Controller;

use App\Kernel;
use App\System\Container;

class UserController
{
  public function index()
  {
    return Container::getInstance()
      ->get('template')
      ->render('user', []);
  }

  public function form($id)
  {    
    return Container::getInstance()
      ->get('template')
      ->render('user.form', [
        'id' => $id
      ]);
  }
}