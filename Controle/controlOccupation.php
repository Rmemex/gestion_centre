<?php 
	include_once("../../Modele/Transaction/transOccupation.php");
	
	class ControlOccupation
	{
		private $transOccup;
		
		function __construct(){
			$this->transOccup = new TransOccupation();

		}
		public function getOcc()
		{
			return $this->transOccup->affiche();	
		}
		
		public function affiche()
		{
			return $this->transOccup->affiche();
		}

		public function inscrire($lbl)
		{
			$this->transOccup->setLib($lbl);

			$this->transOccup->ajouter();
		}

		public function modifier($idOcc,$lbl)
		{
			$this->transOccup->setId($idOcc);
			$this->transOccup->setLib($lbl);
			
			$this->transOccup->modifier();
		}

		public function supprimer($idOcc)
		{
			$this->transOccup->setId($idOcc);
			
			$this->transOccup->supr();
		}

		public function rechercher($idOcc)
		{ 
			$this->transOccup->setId($idOcc);
			$req = $this->transOccup->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>