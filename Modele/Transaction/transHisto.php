<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/histopatient.php");

	class TransHisto extends Histopat
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
			
		}

		public function affiche()
		{ 	
			$idHip = $this->getId();
			$req = $this->bdd->query("SELECT * FROM histopatient WHERE idPat ='$idHip' ");
			return $req;
		}

		public function ajouter()
		{
			$idpat = $this->getIdpat();  
			$idDoc = $this->getDoc();
			$poids = $this->getPoids();
			$tension = $this->getTension();
			$glycemie = $this->getGlyc();
			$temperature = $this->getTemper();
			$signe = $this->getSigne();
			$maladie = $this->getMaladie();
			$date = $this->getDat();
			$allergie = $this->getAller();
			$presc = $this->getPresc();

			$this->bdd->exec("INSERT INTO histopatient (idHisto, idPat , idDoc ,poids, tension, glycemie, temperature, signe, maladie, dates, allergie, prescription) VALUES (NULL,'$idpat', '$idDoc', '$poids','$tension', '$glycemie', '$temperature', '$signe', '$maladie','$date', '$allergie', 'presc')");
	
		}

		public function modifier()
		{
			$idHip = $this->getId();
			$poids = $this->getPoids();
			$tension = $this->getTension();
			$glycemie = $this->getGlyc();
			$temperature = $this->getTemper();
			$signe = $this->getSigne();
			$maladie = $this->getMaladie();
			$date = $this->getDat();
			$allergie = $this->getAller();
			$presc = $this->getPresc();

			$this->bdd->exec("UPDATE histopatient SET  poids ='$poids' , tension ='$tension' , glycemie = '$glycemie' , temperature ='$temperature' , signe= '$signe', maladie= '$maladie', dates='$date', allergie = '$allergie', prescription = '$presc' WHERE idHisto='$idHip' ");
		}

		public function supr()
		{
			$idHip = $this->getId();
			
			$this->bdd->exec("DELETE FROM histopatient WHERE idHisto = $idHip");
	
		}

	}
?>