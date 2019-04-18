<?php

namespace model;

use core\Model;

class Index extends  Model {

   public function getNews()
   {
       $result = $this->db->row('SELECT title, text FROM news');
       return $result;
   }

}