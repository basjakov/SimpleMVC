<?php
/**
 * Created by PhpStorm.
 * User: arman.antonyan
 * Date: 12/04/2019
 * Time: 16:01
 */

namespace Core;

use Core\View;

abstract class Controller
{
    public $route;
    public $view;

    public function  __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);

    }
}