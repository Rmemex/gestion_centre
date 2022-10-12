<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/famille.php");

	class TransFamille extends Famille
	{
		private $bdd;

		function __construct() {
			$con = new Connexion();
			$this->bdd = $con->getCon();
		}

		public function affiche()
		{
			$patId = $this->getPat();
			$req = $this->bdd->query("SELECT *  FROM famille WHERE idPat = '$patId' ");
			return $req;
		}

		public function ajouter()
		{
			$patId = $this->getPat();
			$nom = $this->getNom();
			$prenom = $this->getPrenom();
			$dates = $this->getDates();
			$num = $this->getNum();
			$adresse = $this->getAdresse();
			$stat = $this->getStatut();

			$this->bdd->exec("INSERT INTO famille (idFamille,idPat, nom, prenom, birth, num, adresse, statut) VALUES (NULL, '$patId','$nom', '$prenom', '$dates', '$num', '$adresse', '$stat')");
		}

		public function modifier()
		{
			$id = $this->getId();
			$patId = $this->getPat();
			$nom = $this->getNom();
			$prenom = $this->getPrenom();
			$dates = $this->getDates();
			$num = $this->getNum();
			$adresse = $this->getAdresse();
			$stat = $this->getStatut();

			$this->bdd->exec("UPDATE famille SET idPat ='$nom' , nom = '$nom' , prenom = '$prenom' , birth = '$dates' , num = '$num' , adresse = '$adresse' , statut = '$stat' WHERE idFamille='$id' ");
		}

		public function supr()
		{
			$id = $this->getId();
			
			$this->bdd->exec("DELETE FROM famille WHERE idFamille = '$idPat' ");
		}
	}
?>