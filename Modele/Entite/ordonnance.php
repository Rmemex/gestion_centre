<?php 
	class Ordonnance 
	{
		private $id;
		private $consommation;
		private $nom;
		private $quantité;

		function __construct(){}

		public function getId()
		{
			return $this->id;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}


		public function getNom()
		{
			return $this->nom;
		}
		public function setNom($nvnom)
		{
			$this->nom = $nvnom;
		}

		public function getConsommation()
		{
			return $this->consommation;
		}
		public function setConsommation($consom)
		{
			$this->consommation = $consom;
		}

		public function getQte()
		{
			return $this->quantité;
		}
		public function setQte($qte)
		{
			$this->quantité = $qte;
		}

	}
 ?>