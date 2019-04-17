<?php 
namespace Router;

use core\view;

class Router{

	protected $routes = [];

	protected $params = [];



	public function add($route,$params){


            $route = '#^' . $route . '$#';
            $this->routes[$route] = $params;

	}


	public function match(){

	    $url = trim($_SERVER['REQUEST_URI'],'/');

		foreach ($this->routes as $route => $params) {

			//check url isset in routes
			if (preg_match($route, $url, $matches)) {
				$this->params = $params;

				return true;
			}
		}
		return false;
	}

	public function run(){
		if($this->match()){

			$path = 'controllers\\'.ucfirst($this->params['controller']);
			if (class_exists($path)) {

				$action = $this->params['action'];

				if (method_exists($path, $action)) {
					$controller = new $path($this->params);
					$controller->$action();

				}
				else{
					View::errorrequest(404);
				}
			}
			else{
                View::errorrequest(404);
			}
		}
		else{

            View::errorrequest(404);
		};
	}
}

?>