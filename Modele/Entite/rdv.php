<?php 
	class Rdv 
	{
		private $id;
		private $date;
		private $motif;
		private $heure;
		private $docId;
		private $patId;
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

		public function getDate()
		{
			return $this->date;
		}
		public function setDate($dateR)
		{
			$this->date = $dateR;
		}

		public function getMotif()
		{
			return $this->motif;
		}
		public function setMotif($motifR)
		{
			$this->motif = $motifR;
		}

		public function getHeure()
		{
			return $this->heure;
		}
		public function setHeure($nvheure)
		{
			$this->heure = $nvheure;
		}

		public function getDoc()
		{
			return $this->docId;
		}
		public function setDoc($nvdoc)
		{
			$this->docId = $nvdoc;
		}

		public function getPat()
		{
			return $this->patId;
		}
		public function setPat($nvpat)
		{
			$this->patId = $nvpat;
		}

		public function getStat()
		{
			return $this->statut;
		}
		public function setStat($stat)
		{
			$this->statut = $stat;
		}
	}
 ?>