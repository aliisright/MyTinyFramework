<?php
require 'Providor/AppProvidor.php';
use Controllers\PostController;
use Models\Post;
use Providor\DB;

PostController::create();

var_dump(Post::select(['title'])->where('id', '>', '1')->where('title', '=', 'dd')->where('body', '=', 'sdsd')->getAll());

?>
