<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/patient.php");

	class TransPatient extends Patient
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
			
		}
		
		public function getPat()
		{
			$req = $this->bdd->query("SELECT * FROM patient ");
			return $req;	
		}

		public function affiche()
		{
			$im = $this->getIm();
			$req = $this->bdd->query("SELECT *  FROM patient WHERE idPatient='$im'");
			return $req;
		}

		public function ajouter()
		{
			$im = $this->getIm();
			$nom = $this->getNom();
			$prenom = $this->getPrenom();
			$depart = $this->getDepart();
			$attrib = $this->getAttrib();
			$sexe = $this->getSexe();
			$date = $this->getDates();
			$num = $this->getNum();
			$adresse = $this->getAd();

			$this->bdd->exec("INSERT INTO patient (idPatient,imPat, nomPat, prenomPat, departement, attribution, sexePat, birthPat, numPat, adressePat) VALUES (NULL, '$im','$nom', '$prenom','$depart', '$attrib', '$sexe', '$date', '$num', '$adresse')");
		}

		public function modifier()
		{
			$idPat = $this->getId();
			$im = $this->getIm();
			$nom = $this->getNom();
			$prenom = $this->getPrenom();
			$depart = $this->getDepart();
			$attrib = $this->getAttrib();
			$sexe = $this->getSexe();
			$date = $this->getDates();
			$num = $this->getNum();
			$adresse = $this->getAd();

			$this->bdd->exec("UPDATE patient SET  imPat ='$im' , nomPat ='$nom' , prenomPat = '$prenom' , departement = '$depart', attribution = '$attrib' , sexePat ='$sexe' , birthPat = '$date' ,  numPat='$num' , adressePat ='$adresse' WHERE idPatient='$idPat'");
	
		}

		public function supr()
		{
			$idPat = $this->getId();
			$this->bdd->exec("DELETE FROM patient WHERE idPatient = $idPat");
	
		}

		public function recherche()
		{
			$idP = $this->getId();
			$req = $this->bdd->query("SELECT * FROM patient WHERE idPatient='$idP' ");
			return $req;
		}
	}
?>