<?php 
namespace Router;


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
					echo "Action not found:  ".$action;
				}
			}
			else{
				echo "this controller is not exist  ".$path;
			}
		}
		else{

			echo "router not find";
		};
	}
}

?>