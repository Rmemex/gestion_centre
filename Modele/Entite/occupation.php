<?php 
	class Occupation 
	{
		private $id;
		private $libele;
		
		function __construct(){}

		public function getId()
		{
			return $this->id;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}

		public function getLib()
		{
			return $this->libele;
		}
		public function setLib($lib)
		{
			$this->libele = $lib;
		}
	}
 ?>