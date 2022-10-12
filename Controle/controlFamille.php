<?php 
	include_once("../../Modele/Transaction/transFamille.php");
	
	class ControlFamille
	{
		private $transF;
		
		function __construct(){
			$this->transF = new TransFamille();

		}
		
		public function affiche($idPat)
		{
			$this->transF->setId($idPat);
			return $this->transF->affiche();
		}

		public function inscrire($patId,$nom,$renom,$dates,$num,$adresse,$stat)
		{
			$this->transF->setPat($patId);
			$this->transF->setNom($nom);
			$this->transF->setPrenom($prenom);
			$this->transF->setDates($dates);
			$this->transF->setNum($num);
			$this->transF->setAdresse($adresse);
			$this->transF->setStatut($stat);

			$this->transF->ajouter();
		}

		public function modifier($id,$patId,$nom,$renom,$dates,$num,$adresse,$stat)
		{
			$this->transF->setId($id);
			$this->transF->setPat($patId);
			$this->transF->setNom($nom);
			$this->transF->setPrenom($prenom);
			$this->transF->setDates($dates);
			$this->transF->setNum($num);
			$this->transF->setAdresse($adresse);
			$this->transF->setStatut($stat);
			
			$this->transF->modifier();
		}

		public function supprimer($id)
		{
			$this->transF->setId($id);
			
			$this->transF->supr();
		}
	}
?>