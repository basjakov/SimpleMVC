<?php
/**
 * Created by PhpStorm.
 * User: arman.antonyan
 * Date: 12/04/2019
 * Time: 15:47
 */

namespace controllers;

use Core\Controller;

use lib\Db;


class index extends Controller
{
        public function index(){
            $result = $this->model->getNews();
            $vars = [
                'news' => $result,
            ];
            $this->view->render("Home page" ,$vars);
        }

        public function  loginstore()
        {

               $this->view->redirect('https://www.google.com');


        }
}
