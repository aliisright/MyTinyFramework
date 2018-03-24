<?php
//controllers
require 'controllers/providor.php';
require('controllers/SkillController.php');
require('controllers/HomepageController.php');
require('controllers/GoalController.php');

//Views
include 'views/layouts/header.php';
include 'views/homepage.php';
include 'views/layouts/footer.php';
$goals = fetchCompletedGoals($skill['id']);
var_dump($goal);
?>
