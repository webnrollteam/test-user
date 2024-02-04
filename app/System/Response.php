<?php
namespace App\System;

class Response
{
  private $body = [];

  private $contentType = 'text/html; charset=utf-8';

  private $status = 200;

  public function __construct($body)
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

  public function write()
  {
    header($this->contentType, true, $this->status);
    echo implode('', $this->body);
  }

  public function json($json)
  {
    $this->setContentType('Content-type: application/json; charset=utf-8');
    $this->set(json_encode($json));
    return $this;
  }

  public function notFound()
  {
    $this->setContentType('Content-type: text/html; charset=utf-8');
    $this->setStatus(404);
    $this->set('NOT_FOUND');
    return $this;
  }
}