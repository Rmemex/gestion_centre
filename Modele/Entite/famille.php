<?php 
	class Famille 
	{
		private $id;
		private $patId;
		private $nom;
		private $prenom;
		private $dates;
		private $num;
		private $adresse;
		private $statut;

		function __construct(){}

		public function getId()
		{
			return $this->id;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}

		public function getPat()
		{
			return $this->patId;
		}
		public function setPat($pat)
		{
			$this->patId = $pat;
		}

		public function getNom()
		{
			return $this->nom;
		}
		public function setNom($nvnom)
		{
			$this->nom = $nvnom;
		}

		public function getPrenom()
		{
			return $this->prenom;
		}
		public function setPrenomDates($npr)
		{
			$this->prenom = $npr;
		}

		public function getDates()
		{
			return $this->dates;
		}
		public function setDates($nvd)
		{
			$this->dates = $nvd;
		}

		public function getNum()
		{
			return $this->num;
		}
		public function setNum($tel)
		{
			$this->num = $tel;
		}

		public function getAdresse()
		{
			return $this->adresse;
		}
		public function setAdresse($ad)
		{
			$this->adresse = $ad;
		}

		public function getStatut()
		{
			return $this->statut;
		}
		public function setStatut($stat)
		{
			$this->statut = $stat;
		}

	}
 ?>