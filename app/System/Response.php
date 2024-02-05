<?php
namespace App\System;

class Response
{
  private $body = [];

  private $contentType = 'text/html; charset=utf-8';

  private $location;

  private $status = 200;

  public function __construct($body = '')
  {
    $this->body = [$body];
  }

  public function append($s)
  {
    $this->body[] = $s;
  }

  public function set($s)
  {
    $this->body = [$s];
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }

  public function setLocation($url)
  {
    $this->location = $url;
  }

  public function write($end = false)
  {
    if ($this->location)
    {
      header('Location: ' . $this->location, true, $this->status);
      if ($end)
      {
        exit();
      }
      return;
    }

    header('Content-type: ' . $this->contentType, true, $this->status);
    header($this->contentType, true, $this->status);
    echo implode('', $this->body);
    if ($end)
    {
      exit();
    }
  }

  public function json($json)
  {
    $this->setContentType('application/json; charset=utf-8');
    $this->set(json_encode($json));
    return $this;
  }

  public function notFound()
  {
    $this->setContentType('text/html; charset=utf-8');
    $this->setStatus(404);
    $this->set('NOT_FOUND');
    return $this;
  }

  public function redirect($url)
  {
    $this->setLocation($url);
    $this->setStatus(301);
    return $this;
  }
}