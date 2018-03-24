<?php
require 'Providor/AppProvidor.php';
use Controllers\PostController;
use Providor\PostRequest;
use Providor\Helper;

PostController::create();

$array = [
  'title' => 'dfd', 'body' => 'rere'
];
$fields = Helper::arrayToSlicedString(array_keys($array), ',');
$byeee = implode(',', array_keys($array));
echo $fields;
echo $byeee;
?>
