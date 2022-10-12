<?php 
	include_once("../../Modele/Transaction/transDepart.php");
	
	class ControlDepart
	{
		private $transD;
		
		function __construct(){
			$this->transD = new TransDepart();

		}
		public function getDepart()
		{
			return $this->transD->affiche();	
		}
		
		public function affiche()
		{
			return $this->transD->affiche();
		}

		public function inscrire($nom)
		{
			$this->transD->setNom($nom);

			$this->transD->ajouter();
		}

		public function modifier($id,$nom)
		{
			$this->transD->setId($id);
			$this->transD->setNom($nom);
			
			$this->transD->modifier();
		}

		public function supprimer($id)
		{
			$this->transD->setId($id);
			
			$this->transD->supr();
		}

		public function rechercher($id)
		{ 
			$this->transD->setId($id);
			$req = $this->transD->search();
			$res = $req->fetch();
			return $res;
		}
	}
?>