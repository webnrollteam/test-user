<?php
namespace App\System;

class Template
{
  public function render($template, $data)
  {
    // globals for template
    $DATA = $data;
    $BODY = $template . '.php';
    
    ob_start();
    include APP_DIR . '/Template/' . '_layout.php';
    $content = ob_get_contents();
    ob_end_clean();

    unset($DATA);
    unset($BODY);

    return new Response($content);
  }
}