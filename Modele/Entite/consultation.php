<?php 
	class Consultation 
	{
		private $id;
		private $date;
		private $signe;
		private $repos;
		private $diagnostic;
		
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
			return $this->id;
		}
		public function setDate($nvdate)
		{
			$this->id = $nvdate;
		}

		public function getSigne()
		{
			return $this->signe;
		}
		public function setSigne($nvsigne)
		{
			$this->signe = $nvsigne;
		}

		public function getRepos()
		{
			return $this->repos;
		}
		public function setRepos($nvrepos)
		{
			$this->repos = $nvrepos;
		}

		public function getDiagnostic()
		{
			return $this->diagnostic;
		}
		public function setDiagnostic($diag)
		{
			$this->diagnostic = $diag;
		}

	}
 ?>