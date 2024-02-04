<?php
namespace App\System;

class Template
{
  public function render($template, $data)
  {
    $DATA = $data;
    ob_start();
    include APP_DIR . '/Template/' . $template . '.php';
    $content = ob_get_contents();
    ob_end_clean();

    return new Response($content);
  }
}