<?php 
	include_once("../../Modele/Transaction/transMaladie.php");
	
	class ControlMaladie
	{
		private $transMal;
		
		function __construct(){
			$this->transMal = new TransMaladie();

		}
		
		public function affiche()
		{
			return $this->transMal->affiche();
		}

		public function inscrire($libl)
		{
			$this->transMal->setLibele($libl);

			$this->transMal->ajouter();
		}

		public function modifier($idMald,$libl)
		{
			$this->transMal->setId($idMald);
			$this->transMal->setLibele($libl);
			
			$this->transMal->modifier();
		}

		public function supprimer($idMald)
		{
			$this->transMal->setId($idMald);
			
			$this->transMal->supr();
		}

		public function rechercher($idMald)
		{ 
			$this->transMal->setId($idMald);
			$req = $this->transMal->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>