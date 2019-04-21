<?php



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


//login
$router->add('login',["controller"=>"account","action"=>"login"]);
$router->add('login/store',["controller"=>"account","action"=>"loginstore"]);

//register
$router->add('register',["controller"=>"account","action"=>"register"]);
$router->add('register/store',["controller"=>"account","action"=>"registerstore"]);



$router->run();



?>
