<?php 
	include_once("../../Modele/Transaction/transRdv.php");
	
	class ControlRdv
	{
		private $transrend;
		
		function __construct(){
			$this->transrend = new TransRdv();
		}

		public function getRdv()
		{
			return $this->transrend->getShow();	
		}

		public function getR()
		{
			return $this->transrend->getRdv();	
		}

		public function getRend()
		{
			return $this->transrend->geta();	
		}

		public function showDoc($docId)
		{
			return $this->transrend->showDoc();	
		}
		
		public function affiche()
		{
			return $this->transrend->affiche();
		}

		public function inscrire($date,$motif,$heure,$docId,$patId,$statut)
		{
			$this->transrend->setDate($date);
			$this->transrend->setMotif($motif);
			$this->transrend->setHeure($heure);
			$this->transrend->setDoc($docId);
			$this->transrend->setPat($patId);
			$this->transrend->setStat($statut);

			$this->transrend->ajouter();
		}

		public function modifier($idRDV,$date,$motif,$heure,$docId,$patId)
		{
			$this->transrend->setId($idRDV);
			$this->transrend->setDate($date);
			$this->transrend->setMotif($motif);
			$this->transrend->setHeure($heure);
			$this->transrend->setDoc($docId);
			$this->transrend->setPat($patId);
			
			$this->transrend->modifier();
		}

		public function supprimer($idRDV)
		{
			$this->transrend->setId($idRDV);
			
			$this->transrend->supr();
		}

		public function rechercher($idRDV)
		{ 
			$this->transrend->setId($idRDV);
			$req = $this->transrend->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>