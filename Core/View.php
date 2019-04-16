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
    public $layout = 'default';


    public function __construct($route)
    {
            $this->route = $route;
            $this->path = $route['controller'].'/'.$route['action'];
            echo $this->path;
    }

    public function render($title,$vars = []){
        ob_start();
        require 'view/'.$this->path.'.php';

        $content = ob_get_clean();
        require 'view/layouts/'.$this->layout.'.php';
    }
}