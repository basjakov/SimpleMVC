<?php

use Router\Router;

$router = new Router;

$router->add('posts',["controller"=>"posts","action"=>"index"],'GET');
$router->add('',["controller"=>"index","action"=>"index"],'GET');


//login
$router->add('login',["controller"=>"account","action"=>"login"],'GET');
$router->add('login/store',["controller"=>"account","action"=>"loginstore"],'GET');

//register
$router->add('register',["controller"=>"account","action"=>"register"],'GET');
$router->add('register/store',["controller"=>"account","action"=>"registerstore"],'POST');



$router->run();
