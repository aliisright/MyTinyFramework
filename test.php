<?php
require 'Providor/AppProvidor.php';
use Controllers\PostController;
use Providor\PostRequest;
use Providor\Helper;
use Models\Post;

PostController::create();

$post = new Post();
echo $post->getClassName();



?>
