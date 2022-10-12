<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/personnel.php");

	class TransPers extends Personnel
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
		}

		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM personnel");
			return $req;
		}

		public function getOccup()
		{
			$req = $this->bdd->query("SELECT occupation.idOcc, occupation.libele, personnel.idPerso , personnel.imPers , personnel.nomPers , personnel.prenomPers ,personnel.numPers ,personnel.adressePers FROM personnel INNER JOIN occupation ON personnel.occup = occupation.idOcc");
			return $req;
		}

		public function ajouter()
		{
			$im = $this->getIm();
			$nom = $this->getNom();
			$prenom = $this->getPrenom();
			$contact = $this->getNum();
			$adresse = $this->getAdresse();
			$occup = $this->getOccupation();
			
			$this->bdd->exec("INSERT INTO personnel (idPerso,imPers, nomPers, prenomPers, numPers, adressePers, occup) VALUES (NULL, '$im','$nom', '$prenom', '$contact', '$adresse', $occup)");
		}

		public function modifier()
		{
			$idP = $this->getId();
			$im = $this->getIm();
			$nom = $this->getNom();
			$prenom = $this->getPrenom();
			$contact = $this->getNum();
			$adresse = $this->getAdresse();
			$occup = $this->getOccupation();

			$this->bdd->exec("UPDATE personnel SET imPers = '$im', nomPers = '$nom', prenomPers = '$prenom', numPers = '$contact', adressePers = '$adresse', occup = '$occup' WHERE idPerso = 'idP' ");
		}

		public function supr()
		{
			$idP = $this->getId();
			$this->bdd->exec("DELETE FROM personnel WHERE idPerso = '$idP' ");
	
		}

		public function recherche()
		{
			$idP = $this->getId();
			$req = $this->bdd->query("SELECT etudiant.matricule mat, etudiant.nom nom, etudiant.prenom pre, filiere.designation design, etudiant.idNiv niv, etudiant.email mail, etudiant.idGp gp, etudiant.idFil fil FROM etudiant INNER JOIN filiere ON etudiant.idFil= filiere.idFiliere WHERE matricule='$idEtud' ");
			return $req;
		}

	}
?>