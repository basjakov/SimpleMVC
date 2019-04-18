<?php
/**
 * Created by PhpStorm.
 * User: arman.antonyan
 * Date: 15/04/2019
 * Time: 17:50
 */

namespace Core;


 class View
{

    public $path;
    public $route;
    public $layout = 'default';


    public function __construct($route)
    {
            $this->route = $route;
            $this->path = $route['controller'].'/'.$route['action'];

    }

    public function render($title,$vars = []){
        extract($vars);
        $path = 'view/'.$this->path.'.php';

        if(file_exists($path)){

            ob_start();
            require  $path;
            $content = ob_get_clean();
            require 'view/layouts/'.$this->layout.'.php';
        }
        else {
             echo "view layout not found";
            }
    }
     public function  redirect($url){
                header('location: '.$url);
                exit;
     }
    public static function errorrequest($code){
        http_response_code($code);
        $path =  require 'view/errors/'.$code.'.php';
        if(file_exists($path))
        {
            require  $path;
            exit;
        }


    }


}