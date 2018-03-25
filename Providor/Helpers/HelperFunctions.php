<?php
use Providor\Helper;
use Requests\Request;
use Requests\Getter;

function render($file_path)
{
  //File real path builder
  $real_file_path = Helper::fileLinkBuilder($file_path);

  //$entry_file = substr($real_file_path, strrpos($file_path, '/') + 1);

  //$url = Request::getUrlBuilder($entry_file, $params);

  return require($real_file_path);
}

function post($key)
{
    $request_instance = Helper::postRequestCatcher();
    if($request_instance) { return $request_instance->input($key); }
}

function get($key)
{
    $get = Helper::getRequestCatcher();
    if($get) { return $get->getter($key); }
}
