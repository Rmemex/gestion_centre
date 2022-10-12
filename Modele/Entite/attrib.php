<?php 
	class Atrib
	{
		private $id;
		private $idD;
		private $nom;
		
		function __construct(){}

		public function getId()
		{
			return $this->id;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}

		public function getIdD()
		{
			return $this->idD;
		}
		public function setIdD($nid)
		{
			$this->idD = $nid;
		}

		public function getNom()
		{
			return $this->nom;
		}
		public function setNom($nvnom)
		{
			$this->nom = $nvnom;
		}
	}
 ?>