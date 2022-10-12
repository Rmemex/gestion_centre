<?php 
	class Personnel 
	{
		private $idP;
		private $im;
		private $nom;
		private $prenom;
		private $num;
		private $adresse;
		private $occup;

		function __construct(){}

		public function getId()
		{
			return $this->idP;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}

		public function getIm()
		{
			return $this->im;
		}
		public function setIm($nvim)
		{
			$this->im = $nvim;
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
		public function setPrenom($nvpre)
		{
			$this->prenom = $nvpre;
		}

		public function getNum()
		{
			return $this->num;
		}
		public function setNum($nvnum)
		{
			$this->num = $nvnum;
		}

		public function getAdresse()
		{
			return $this->adresse;
		}
		public function setAdresse($adres)
		{
			$this->adresse = $adres;
		}

		public function getOccupation()
		{
			return $this->occup;
		}
		public function setOccupation($nvocc)
		{
			$this->occup = $nvocc;
		}

	}
 ?>