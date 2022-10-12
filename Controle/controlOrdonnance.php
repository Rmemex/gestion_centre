<?php 
	include_once("../../Modele/Transaction/transOrdonnance.php");
	
	class ControlOrdonnance
	{
		private $transOrdon;
		
		function __construct(){
			$this->transOrdon = new TransOrdo();

		}
		
		public function affiche()
		{
			return $this->transOrdon->affiche();
		}

		public function inscrire($nom,$conso,$quantite)
		{
			$this->transOrdon->setNom($nom);
			$this->transOrdon->setConsommation($conso);
			$this->transOrdon->setQte($quantite);

			$this->transOrdon->ajouter();
		}

		public function modifier($idOrdo,$nom,$conso,$quantite)
		{
			$this->transOrdon->setId($idOrdo);
			$this->transOrdon->setNom($nom);
			$this->transOrdon->setConsommation($conso);
			$this->transOrdon->setQte($quantite);
			
			$this->transOrdon->modifier();
		}

		public function supprimer($idOrdo)
		{
			$this->transOrdon->setId($idOrdo);
			
			$this->transOrdon->supr();
		}

		public function rechercher($idOrdo)
		{ 
			$this->transOrdon->setId($idOrdo);
			$req = $this->transOrdon->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>