<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/maladie.php");

	class TransMaladie extends Maladie
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
		}

		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM maladie");
			return $req;
		}

		public function ajouter()
		{
			$libl = $this->getLibele();
			
			$this->bdd->exec("INSERT INTO maladie (idMaladie,libeleMaladie) VALUES (NULL,'$libl')");
	
		}

		public function modifier()
		{
			$idMald = $this->getId();
			$libl = $this->getLibele();

			$this->bdd->exec("UPDATE maladie SET  libeleMaladie ='$libl' WHERE idMaladie='$idMald'");
	
		}

		public function supr()
		{
			echo $idMald = $this->getId();
			
			$this->bdd->exec("DELETE FROM maladie WHERE idMaladie = $idMald");
	
		}

		public function recherche()
		{
			$idOc = $this->getId();
			$req = $this->bdd->query("SELECT etudiant.matricule mat, etudiant.nom nom, etudiant.prenom pre, filiere.designation design, etudiant.idNiv niv, etudiant.email mail, etudiant.idGp gp, etudiant.idFil fil FROM etudiant INNER JOIN filiere ON etudiant.idFil= filiere.idFiliere WHERE matricule='$idEtud' ");
			return $req;
		}

	}
?>