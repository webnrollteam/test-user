<?php

use App\System\Container;

function get_user()
{
  return Container::getInstance()->get('security')->getUser();
}