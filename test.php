<?php
require 'Providor/AppProvidor.php';
use Controllers\PostController;
use Models\Post;
use Providor\QueryBuilder;
use Providor\Model;

PostController::create();


$posts = Post::where('id', '<', '50')->getAll();

var_dump($posts);

?>
