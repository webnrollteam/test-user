<?php
namespace App\Controller;

use App\System\Response;

class LoginController extends BaseController
{
  public function index()
  {
    $data = [
      'errors' => []
    ];

    if ($this->request->getMethod() == 'POST')
    {
      $user = $this->security->authorize(
        $this->request->get('email'),
        $this->request->get('password'));
  
      if ($user)
      {
        return (new Response())
          ->redirect('/');
      }

      $data['errors'][] = 'Ошибка авторизации';
    }

    return $this->template
      ->render('login', $data);
  }

  public function logout()
  {
    $this->security->logout();
    
    return (new Response())
      ->redirect('/');
  }
}