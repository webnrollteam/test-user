<?php

use App\Kernel;
use App\System\Container;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\LoginController;

define('APP_DIR', __DIR__ . '/../app');

require APP_DIR . '/autoload.php';

Kernel::getInstance()->buildContainer();

$routing = Container::getInstance()->get('routing');
$routing->get('#^/$#', [ HomeController::class, 'index' ]);
$routing->get('#^/login/$#', [ LoginController::class, 'index' ]);
$routing->post('#^/login/$#', [ LoginController::class, 'index' ]);
$routing->get('#^/logout/$#', [ LoginController::class, 'logout' ]);
$routing->get('#^/user/$#', [ UserController::class, 'index' ]);
$routing->get('#^/user/(\d+)/$#', [ UserController::class, 'form' ]);

Kernel::getInstance()->serve();
