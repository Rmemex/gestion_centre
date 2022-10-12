<?php 
	include_once("../../Modele/Transaction/transUserlog.php");
	
	class ControlUserlog
	{
		private $transUl;
		
		function __construct(){
			$this->transUl = new TransUserlog();
		}
		
		public function affiche()
		{
			return $this->transUl->affiche();
		}

		public function inscrire($idUser,$login,$logout)
		{
			$this->transUl->setIduser($idUser);
			$this->transUl->setLogin($login);
			$this->transUl->setLogout($logout);

			$this->transUl->ajouter();
		}

		public function modifier($idRDV,$idUser,$login,$logout)
		{
			$this->transUl->setId($idRDV);
			$this->transUl->setIduser($idUser);
			$this->transUl->setLogin($login);
			$this->transUl->setLogout($logout);
			
			$this->transUl->modifier();
		}

		public function supprimer($idRDV)
		{
			$this->transUl->setId($idRDV);
			
			$this->transUl->supr();
		}

		public function rechercher($idRDV)
		{ 
			$this->transUl->setId($idRDV);
			$req = $this->transUl->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>