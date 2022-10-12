<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/rdv.php");

	class TransRdv extends Rdv
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
			
		}

		public function getShow()
		{
			$patient = $this->bdd->query("SELECT patient.idPatient, patient.nomPat, patient.prenomPat, personnel.idPerso, personnel.prenomPers,rdv.idRdv , rdv.dates, rdv.heure, rdv.motif, occupation.libele, rdv.statut FROM patient INNER JOIN rdv ON patient.idPatient = rdv.idPat INNER JOIN personnel ON personnel.idPerso = rdv.idDoc INNER JOIN occupation ON occupation.idOcc = personnel.occup WHERE rdv.statut= '0' ");
			return $patient;
		}

		public function getRdv()
		{
			$patient = $this->bdd->query("SELECT patient.idPatient, patient.nomPat, patient.prenomPat, personnel.idPerso, personnel.prenomPers,rdv.idRdv , rdv.dates, rdv.heure, rdv.motif, occupation.libele, rdv.statut FROM patient INNER JOIN rdv ON patient.idPatient = rdv.idPat INNER JOIN personnel ON personnel.idPerso = rdv.idDoc INNER JOIN occupation ON occupation.idOcc = personnel.occup ORDER BY rdv.dates");
			return $patient;
		}

		public function geta()
		{
			$patient = $this->bdd->query("SELECT patient.idPatient, patient.nomPat, patient.prenomPat, personnel.idPerso, personnel.prenomPers,rdv.idRdv , rdv.dates, rdv.heure, rdv.motif, occupation.libele, rdv.statut FROM patient INNER JOIN rdv ON patient.idPatient = rdv.idPat INNER JOIN personnel ON personnel.idPerso = rdv.idDoc INNER JOIN occupation ON occupation.idOcc = personnel.occup WHERE rdv.statut= '0' ORDER BY rdv.dates");
			return $patient;
		}

		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM rdv");
			return $req;
		}

		public function ajouter()
		{
			$date = $this->getDate();
			$motif = $this->getMotif();
			$heure = $this->getHeure();
			$idDoc = $this->getDoc();
			$idPat = $this->getPat();
			$statut = $this->getStat();
			
			$this->bdd->exec ("INSERT INTO rdv (idRdv,dates, motif, heure, idDoc, idPat, statut) VALUES (NULL, '$date','$motif', '$heure', '$idDoc', '$idPat', '$statut' ");
		}

		public function modifier()
		{
			$idRDV = $this->getId();
			$date = $this->getDate();
			$motif = $this->getMotif();
			$heure = $this->getHeure();
			$statut = $this->getStat();

			$this->bdd->exec("UPDATE rdv SET  dates ='$date' , motif ='$motif' , heure = '$heure', statut = '$statut' WHERE idRdv='$idRDV'");
	
		}

		public function supr()
		{
			echo $idRDV = $this->getId();
			
			$this->bdd->exec("DELETE FROM rdv WHERE idRdv = $idRDV");
	
		}

		public function recherche()
		{
			$idP = $this->getId();
			$req = $this->bdd->query("SELECT etudiant.matricule mat, etudiant.nom nom, etudiant.prenom pre, filiere.designation design, etudiant.idNiv niv, etudiant.email mail, etudiant.idGp gp, etudiant.idFil fil FROM etudiant INNER JOIN filiere ON etudiant.idFil= filiere.idFiliere WHERE matricule='$idEtud' ");
			return $req;
		}

	}
?>