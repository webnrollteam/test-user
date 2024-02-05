<?php

namespace App\Controller;

use App\System\Response;

class RegisterController extends BaseController
{
  public function __construct()
  {
    parent::__construct();
  }

  public function form($errors = [])
  {
    $data = [
      'errors' => $errors,
    ];

    $row = [
      'id' => '',
      'email' => '',
      'name' => '',
    ];

    $data['row'] = $row;

    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    $data['token'] = $_SESSION['token'];

    return $this->template
      ->render('register', $data);
  }

  public function register()
  {
    $token = $this->request->get('token');

    if (!$token || $token !== $_SESSION['token'])
    {
      return (new Response())
        ->setStatus(405)
        ->write(true);
    }

    if (!$this->request->get('password1'))
    {
      return $this->form([
        'Пароль не задан'
      ]);
    }

    if ($this->request->get('password1') != $this->request->get('password2'))
    {
      return $this->form([
        'Пароли не совпадают'
      ]);
    }

    $this->db->query(
      'insert user (name, email, password) values (?, ?, ?)',
      [
        'sss', $this->request->get('name'), $this->request->get('email'),
        $this->security->hashPassword($this->request->get('password1'))
      ]
    );

    return (new Response())
      ->redirect('/login/');
  }
}
