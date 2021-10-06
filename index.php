<?php

require_once('app/router.php');
require_once('controller/BlogController.php');

$router = new Router();
$router->redirect();

$blog = new BlogController();
$blog->getResult();

?>