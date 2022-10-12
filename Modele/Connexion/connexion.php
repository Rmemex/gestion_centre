<?php 
	include("../../config.php");
	class Connexion extends Config
	{
		public $bdd ;
		public function Connexion(){
			$this->bdd = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName."","$this->user","$this->pass");
			$this->bdd->exec("SET NAMES utf8");
			return $this->bdd;
		}
		public function getCon()
		{
			return $this->bdd;
		}
	}
 ?>