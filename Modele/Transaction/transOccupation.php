<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/occupation.php");

	class TransOccupation extends Occupation
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
		}
		
		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM occupation");
			return $req;
		}

		public function ajouter()
		{
			$lbl = $this->getLib();
			
			$this->bdd->exec("INSERT INTO occupation (idOcc,libele) VALUES (NULL,'$lbl')");
	
		}

		public function modifier()
		{
			$idOcc = $this->getId();
			$lbl = $this->getLib();

			$this->bdd->exec("UPDATE occupation SET  libele ='$lbl' WHERE idOcc ='$idOcc'");
	
		}

		public function supr()
		{
			echo $idOc = $this->getId();
			
			$this->bdd->exec("DELETE FROM occupation WHERE idOcc = $idOc");
	
		}
	}
?>