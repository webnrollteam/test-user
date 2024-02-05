<?php

namespace App\Controller;

use App\System\Container;

class UserController extends BaseController
{
  public function index()
  {
    $rows = $this->db->get('select * from user')
      ->fetchAll();

    return $this->template
      ->render('user', [
        'rows' => $rows
      ]);
  }

  public function form($id)
  {
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

    return $this->template
      ->render('user.form', [
        'id' => $id,
        'row' => $row
      ]);
  }
}
