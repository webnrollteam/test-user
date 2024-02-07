<?php

use App\Kernel;
use App\System\Container;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\LoginController;
use App\Controller\RegisterController;

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
$routing->post('#^/user/(\d+)/$#', [ UserController::class, 'save' ]);
$routing->get('#^/register/$#', [ RegisterController::class, 'form' ]);
$routing->post('#^/register/$#', [ RegisterController::class, 'register' ]);

$routing->get('#^/api/v1/user/$#', [ UserController::class, 'list' ]);
$routing->delete('#^/api/v1/user/(\d+)/$#', [ UserController::class, 'delete' ]);

Kernel::getInstance()->serve();
