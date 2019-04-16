<?php 
namespace Model;

class Model {
	public $db;


	public function __construct($host,$user,$pass,$db) {
		$this->db = mysqli_connect($host,$user,$pass,$db);
		if (!$this->db) {
			exit('No connection with database !');
		}
		mysqli_query($this->db,"SET NAMES 'utf8'");

		return $this->db;
	}

	public function insert_db($firstname,$lastname,$email,$text){
		$sql = "INSERT INTO `ContactForm` (`firstname`,`lastname`, `email`, `text`) VALUES ('$firstname','$lastname','$email','$text')";
		$res = mysqli_query($this->db,$sql);
	}

	public function delete_id($id){
		$sql = "DELETE FROM ContactForm WHERE id='$id'";
		$res = mysqli_query($this->db,$sql);

	
	}



	public function get_all_db(){
		$sql = "SELECT * FROM `ContactForm`";
		$res = mysqli_query($this->db,$sql);

		for($i=0; $i < mysqli_num_rows($res); $i++) {
			$row[] = mysqli_fetch_array($res,MYSQLI_ASSOC);
		}
		return $row;


		
		
		}


}

 ?>