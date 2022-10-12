<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/ordonnance.php");

	class TransOrdo extends Ordonnance
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
			
		}

		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM ordonnance");
			return $req;
		}

		public function ajouter()
		{
			$nom = $this->getNom();
			$conso = $this->getconsommation();
			$quantite = $this->getQte();
			
			$this->bdd->exec("INSERT INTO ordonnance (idOrdonnance, nom_medicament, consoOrdonnance, quantite) VALUES (NULL,'$nom', '$conso', '$quantite')");
	
		}

		public function modifier()
		{
			$idOrdo = $this->getId();
			$nom = $this->getNom();
			$conso = $this->getconsommation();
			$quantite = $this->getQte();

			$this->bdd->exec("UPDATE ordonnance SET  nom_medicament ='$nom' , consoOrdonnance ='$conso' , quantite = '$quantite' WHERE idOrdonnance='$idOrdo'");
	
		}

		public function supr()
		{
			echo $idOrdo = $this->getId();
			
			$this->bdd->exec("DELETE FROM ordonnance WHERE idOrdonnance = $idOrdo");
	
		}

		public function recherche()
		{
			$idP = $this->getId();
			$req = $this->bdd->query("SELECT etudiant.matricule mat, etudiant.nom nom, etudiant.prenom pre, filiere.designation design, etudiant.idNiv niv, etudiant.email mail, etudiant.idGp gp, etudiant.idFil fil FROM etudiant INNER JOIN filiere ON etudiant.idFil= filiere.idFiliere WHERE matricule='$idEtud' ");
			return $req;
		}

	}
?>