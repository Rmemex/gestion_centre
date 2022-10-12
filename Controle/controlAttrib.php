<?php 
	include_once("../../Modele/Transaction/transAttrib.php");
	
	class ControlAttrib
	{
		private $transA;
		
		function __construct(){
			$this->transA = new TransAtt();

		}
		public function getAttrib()
		{
			return $this->transA->affiche();	
		}
		
		public function show()
		{
			return $this->transA->show();
		}

		public function affiche()
		{
			return $this->transA->affiche();
		}

		public function inscrire($nom,$idD)
		{
			$this->transA->setNom($nom);
			$this->transA->setIdD($idD);

			$this->transA->ajouter();
		}

		public function modifier($id,$idD,$nom)
		{
			$this->transA->setId($id);
			$this->transA->setIdD($idD);
			$this->transA->setNom($nom);
			
			$this->transA->modifier();
		}

		public function supprimer($id)
		{
			$this->transA->setId($id);
			
			$this->transA->supr();
		}

		public function rechercher($id)
		{ 
			$this->transA->setId($id);
			$req = $this->transA->search();
			$res = $req->fetch();
			return $res;
		}
	}
?>