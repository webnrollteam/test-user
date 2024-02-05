<?php
namespace App\System;

class Security
{
  private $sessionKey = 'USER_AUTH';

  public function __construct()
  {
    //
  }

  public function authorize($email, $password)
  {
    unset($_SESSION[$this->sessionKey]);

    $user = $this->findUser($email, $password);
    if ($user)
    {
      $_SESSION[$this->sessionKey] = $this->generateToken($user);
    }

    return $user;
  }

  public function logout()
  {
    unset($_SESSION[$this->sessionKey]);
  }

  public function isAuthorized()
  {
    return isset($_SESSION[$this->sessionKey]);
  }

  public function getUser()
  {
    return isset($_SESSION[$this->sessionKey]) ?
      json_decode($_SESSION[$this->sessionKey], true) : null;
  }

  public function hashPassword($password)
  {
    return md5($password);
  }

  private function findUser($email, $password)
  {
    $hashPassword = $this->hashPassword($password);

    $db = Container::getInstance()->get('db');

    return $db->get('select * from user where email = ? and password = ?', ['ss', $email, $hashPassword])
      ->fetch();
  }

  private function generateToken(array $user)
  {
    return json_encode($user);
  }
}
