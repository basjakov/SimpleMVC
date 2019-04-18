<?php
/**
 * Created by PhpStorm.
 * User: arman.antonyan
 * Date: 12/04/2019
 * Time: 15:47
 */

namespace controllers;

use Core\Controller;

class posts extends  Controller
{
        public function index(){

                $this->view->render('Home page');
        }
}