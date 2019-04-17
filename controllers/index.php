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
            $db = new Db();


            $params = [
              'id'=>1,
            ];
            $data = $db->column('SELECT name FROM users WHERE id=:id',$params);

            var_dump($data);

            $this->view->render('Welcome');
        }
}