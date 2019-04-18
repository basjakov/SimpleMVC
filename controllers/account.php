<?php
/**
 * Created by PhpStorm.
 * User: arman.antonyan
 * Date: 18/04/2019
 * Time: 14:13
 */

namespace controllers;

use Core\Controller;


class account extends Controller
{

            public function login()
            {
                        $this->view->render('Welcome login page');
            }
            public function loginstore()
            {
                        header("Location: http://www.redirect.to.url.com/");
            }

            //Register actions

            public function register()
            {

            }
            public function registerstore()
            {

            }


}