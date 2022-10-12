<?php 
	class Histopat
	{
		private $id;
		private $idPat;
		private $idDoc;
		private $poids;
		private $tension;
		private $glycemie;
		private $temperature;
		private $signe;
		private $maladie;
		private $date;
		private $allergie;
		private $presc;

		function __construct(){}

		public function getId()
		{
			return $this->id;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}

		public function getIdpat()
		{
			return $this->id;
		}
		public function setIdpat($pat)
		{
			$this->id = $pat;
		}

		public function getDoc()
		{
			return $this->id;
		}
		public function setDoc($doc)
		{
			$this->id = $doc;
		}

		public function getPoids()
		{
			return $this->poids;
		}
		public function setPoids($kg)
		{
			$this->poids = $kg;
		}

		public function getTension()
		{
			return $this->tension;
		}
		public function setTension($tens)
		{
			$this->tension = $tens;
		}

		public function getGlyc()
		{
			return $this->glycemie;
		}
		public function setGlyc($gly)
		{
			$this->glycemie = $gly;
		}

		public function getTemper()
		{
			return $this->temperature;
		}
		public function setTemper($temp)
		{
			$this->temperature = $temp;
		}

		public function getSigne()
		{
			return $this->signe;
		}
		public function setSigne($nvsg)
		{
			$this->signe = $nvsg;
		}

		public function getMaladie()
		{
			return $this->maladie;
		}
		public function setMaladie($nvmal)
		{
			$this->maladie = $nvmal;
		}

		public function getDat()
		{
			return $this->id;
		}
		public function setDat($nvdate)
		{
			$this->id = $nvdate;
		}

		public function getAller()
		{
			return $this->allergie;
		}
		public function setAller($nvalg)
		{
			$this->allergie = $nvalg;
		}

		public function getPresc()
		{
			return $this->presc;
		}
		public function setPresc($nvp)
		{
			$this->presc = $nvp;
		}
	}
 ?>