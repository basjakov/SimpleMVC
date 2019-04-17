<?php
require 'config.php';


use Router\Router;

// use model\Model;

spl_autoload_register(function ($class) {
  	$path = str_replace('\\', '/', $class.'.php');
  	if (file_exists($path)) {
  		require $path;
  	}

});


$router = new Router;

$router->add('posts',["controller"=>"posts","action"=>"index"]);
$router->add('',["controller"=>"index","action"=>"index"]);

$router->run();



?>
