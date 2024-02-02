<?php
use App\Kernel;

define('APP_DIR', __DIR__ . '/../app');

require APP_DIR . '/autoload.php';

Kernel::getInstance()->serve();
