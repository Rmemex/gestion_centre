<?php 
	include_once("../../Modele/Transaction/transConsultation.php");
	
	class ControlConsult
	{
		private $transConsult;
		
		function __construct(){
			$this->transConsult = new TransConsult();

		}
		
		public function affiche()
		{
			return $this->transConsult->affiche();
		}

		public function inscrire($date,$signe,$repos,$diagno)
		{
			$this->transConsult->setDate($date);
			$this->transConsult->setSigne($signe);
			$this->transConsult->setRepos($repos);
			$this->transConsult->setDiagnostic($diagno);

			$this->transConsult->ajouter();
		}

		public function modifier($idDiag, $date, $signe,$repos,$diagno)
		{
			$this->transConsult->setId($idDiag);
			$this->transConsult->setDate($date);
			$this->transConsult->setSigne($signe);
			$this->transConsult->setRepos($repos);
			$this->transConsult->setDiagnostic($diagno);
			
			$this->transConsult->modifier();
		}

		public function supprimer($idDiag)
		{
			$this->transConsult->setId($idDiag);
			
			$this->transConsult->supr();
		}

		public function rechercher($idDiag)
		{ 
			$this->transConsult->setId($idDiag);
			$req = $this->transConsult->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>