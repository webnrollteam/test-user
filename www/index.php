<?php
use App\Kernel;
use App\System\Container;
use App\System\Response;

define('APP_DIR', __DIR__ . '/../app');

require APP_DIR . '/autoload.php';

Kernel::getInstance()->buildContainer();

$routing = Container::getInstance()->get('routing');
$routing->get('#/#', function ()
{
  return new Response('HOME');
});

Kernel::getInstance()->serve();
