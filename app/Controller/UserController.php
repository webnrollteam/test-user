<?php

namespace App\Controller;

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
