<?php

namespace App\Controller;

use App\System\Response;

class UserController extends BaseController
{
  public function __construct()
  {
    $this->protected = true;

    parent::__construct();
  }

  public function index()
  {
    $rows = $this->db->get('select * from user')
      ->fetchAll();

    return $this->template
      ->render('user', [
        'rows' => $rows
      ]);
  }

  public function list()
  {
    $rows = $this->db->get('select * from user')
      ->fetchAll();

    return $this->json([
      'rows' => $rows
    ]);
  }

  public function form($id, $errors = [])
  {
    $data = [
      'id' => $id,
      'errors' => $errors,
    ];

    $row = $this->db->get('select * from user where id = ?', ['i', $id])
      ->fetch();

    if (!$row)
    {
      $row = [
        'id' => '',
        'email' => '',
        'name' => '',
      ];
    }

    $data['row'] = $row;

    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    $data['token'] = $_SESSION['token'];

    return $this->template
      ->render('user.form', $data);
  }

  public function save($id)
  {
    $token = $this->request->get('token');

    if (!$token || $token !== $_SESSION['token']) {
      return (new Response())
        ->setStatus(405)
        ->write(true);
    }

    if ($id == 0 && !$this->request->get('password1'))
    {
      return $this->form($id, [
        'Пароль не задан'
      ]);
    }

    if ($this->request->get('password1') &&
      $this->request->get('password1') != $this->request->get('password2'))
    {
      return $this->form($id, [
        'Пароли не совпадают'
      ]);
    }

    if ($id > 0)
    {
      $this->db->query('update user set name = ?, email = ? where id = ?',
        ['ssi', $this->request->get('name'), $this->request->get('email'), $id]);

      if ($this->request->get('password1'))
      {
        $this->db->query('update user set password = ? where id = ?',
          ['si', $this->security->hashPassword($this->request->get('password1')), $id]);
      }
    }
    else
    {
      $this->db->query('insert user (name, email, password) values (?, ?, ?)',
      ['sss', $this->request->get('name'), $this->request->get('email'),
        $this->security->hashPassword($this->request->get('password1'))]);
    }

    return (new Response())
      ->redirect('/user/');
  }

  public function delete($id)
  {
    $this->db->query('delete from user where id = ?', ['i', $id]);

    return (new Response())->json([
      'success' => true,
    ]);
  }
}
