<?php 
	class Maladie 
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

		public function getLibele()
		{
			return $this->libele;
		}
		public function setLibele($nvlibele)
		{
			$this->libele = $nvlibele;
		}

	}
 ?>