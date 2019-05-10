<?php 
namespace Router;

use core\view;

class Router{

	protected $routes = [];

	protected $params = [];



	public function add($route,$params,$type){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $route = '#^' . $route . '$#';
            $this->routes[$route] = $params;
            // The request is using the POST method
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $route = '#^' . $route . '$#';
            $this->routes[$route] = $params;
            // The request is using the POST method
        }
        else{
            echo "You dont have right request";
        }

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