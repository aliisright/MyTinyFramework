<?php
require 'Providor/AppProvidor.php';
use Controllers\PostController;

PostController::create();
echo get('id');
?>
