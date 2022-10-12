<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/consultation.php");

	class TransConsult extends Consultation
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
		}

		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM consultation");
			return $req;
		}

		public function ajouter()
		{
			$date = $this->getDate();
			$signe = $this->getSigne();
			$repos = $this->getRepos();
			$diagno = $this->getDiagnostic();
			
			$this->bdd->exec ("INSERT INTO consultation (idConsult,dateConsult,signeConsult, reposConsult, diagConsult) VALUES (NULL, '$date',$signe','$repos', '$diagno'");
	
		}

		public function modifier()
		{
			$idDiag = $this->getId();
			$date = $this->getDate();
			$signe = $this->getSigne();
			$repos = $this->getRepos();
			$diagno = $this->getDiagnostic();

			$this->bdd->exec("UPDATE consultation SET  dateConsult ='$date' , signeConsult ='$signe' , reposConsult ='$repos' , diagConsult = '$diagno' WHERE idConsult='$idDiag'");
	
		}

		public function supr()
		{
			echo $idDiag = $this->getId();
			
			$this->bdd->exec("DELETE FROM consultation WHERE idConsult = $idDiag");
	
		}

		public function recherche()
		{
			$idP = $this->getId();
			$req = $this->bdd->query("SELECT etudiant.matricule mat, etudiant.nom nom, etudiant.prenom pre, filiere.designation design, etudiant.idNiv niv, etudiant.email mail, etudiant.idGp gp, etudiant.idFil fil FROM etudiant INNER JOIN filiere ON etudiant.idFil= filiere.idFiliere WHERE matricule='$idEtud' ");
			return $req;
		}

	}
?>