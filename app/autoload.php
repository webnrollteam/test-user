<?php
spl_autoload_register(function ($className)
{
  $ds = DIRECTORY_SEPARATOR;
  $dir = __DIR__;

  $className = str_replace('App\\', '', $className);
  $className = str_replace('\\', $ds, $className);

  $file = "{$dir}{$ds}{$className}.php";

  if (!is_readable($file))
  {
    throw new Exception("Autoloader can't find {$file}");
  }

  require_once $file;
});
