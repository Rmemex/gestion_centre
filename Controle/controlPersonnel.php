<?php 
	include_once("../../Modele/Transaction/transPersonnel.php");
	
	class ControlPers
	{
		private $transP;
		
		function __construct(){
			$this->transP = new TransPers();

		}

		public function getPers()
		{
			return $this->transP->getOccup();	
		}

		public function affiche()
		{
			return $this->transP->affiche();
		}

		public function inscrire($im,$nom,$prenom,$contact,$adresse,$occup)
		{
			$this->transP->setIm($im);
			$this->transP->setNom($nom);
			$this->transP->setPrenom($prenom);
			$this->transP->setNum($contact);
			$this->transP->setAdresse($adresse);
			$this->transP->setOccupation($occup);

			$this->transP->ajouter();
		}

		public function modifier($idP,$im,$nom,$prenom,$contact,$adresse,$occup)
		{
			$this->transP->setId($idP);
			$this->transP->setIm($im);
			$this->transP->setNom($nom);
			$this->transP->setPrenom($prenom);
			$this->transP->setNum($contact);
			$this->transP->setAdresse($adresse);
			$this->transP->setOccupation($occup);
			
			$this->transP->modifier();
		}

		public function supprimer($idP)
		{
			$this->transP->setId($idP);
			$this->transP->supr();
		}

		public function rechercher($idPers)
		{ 
			$this->transP->setId($idPers);
			$req = $this->transP->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>