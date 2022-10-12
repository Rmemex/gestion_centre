<?php 
	class Patient 
	{
		private $id;
		private $im;
		private $nom;
		private $prenom;
		private $depart;
		private $attrib;
		private $sexe;
		private $dates;
		private $num;
		private $adresse;

		function __construct(){}

		public function getId()
		{
			return $this->id;
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
		public function setPrenom($nvnpre)
		{
			$this->prenom = $nvnpre;
		}

		public function getDepart()
		{
			return $this->depart;
		}
		public function setDepart($nvdepart)
		{
			$this->depart = $nvdepart;
		}

		public function getAttrib()
		{
			return $this->attrib;
		}
		public function setAttrib($nvattrib)
		{
			$this->attrib = $nvattrib;
		}

		public function getSexe()
		{
			return $this->sexe;
		}
		public function setSexe($sex)
		{
			$this->sexe = $sex;
		}

		public function getDates()
		{
			return $this->dates;
		}
		public function setDates($date)
		{
			$this->dates = $date;
		}

		public function getNum()
		{
			return $this->num;
		}
		public function setNum($nvnum)
		{
			$this->num = $nvnum;
		}

		public function getAd()
		{
			return $this->adresse;
		}
		public function setAd($adres)
		{
			$this->adresse = $adres;
		}
	}
 ?>