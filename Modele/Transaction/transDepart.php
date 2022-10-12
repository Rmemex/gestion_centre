<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/depart.php");

	class TransDepart extends Depart
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
		}
		
		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM depart");
			return $req;
		}

		public function ajouter()
		{
			$nom = $this->getNom();
			
			$this->bdd->exec("INSERT INTO depart (idDepart,nom) VALUES (NULL,'$nom')");
	
		}

		public function modifier()
		{
			$idDepart = $this->getId();
			$nom = $this->getNom();

			$this->bdd->exec("UPDATE depart SET  nom ='$nom' WHERE idDepart ='$idDepart'");
	
		}

		public function supr()
		{
			echo $idD = $this->getId();
			
			$this->bdd->exec("DELETE FROM depart WHERE idDepart = $idD");
	
		}
	}
?>