<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/attrib.php");

	class TransAtt extends Atrib
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
		}
		
		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM attribut");
			return $req;
		}

		public function show()
		{
			$req = $this->bdd->query("SELECT depart.nom nomD, attribut.idAttrib, attribut.nom FROM attribut INNER JOIN depart ON depart.idDepart=attribut.dpart ORDER BY idAttrib");
			return $req;
		}

		public function ajouter()
		{
			$nom = $this->getNom();
			$idD = $this->getIdD();
			
			$this->bdd->exec("INSERT INTO attribut (idAttrib,nom,dpart) VALUES (NULL,'$nom','$idD')");
	
		}

		public function modifier()
		{
			$id = $this->getId();
			$idD = $this->getIdD();
			$nom = $this->getNom();

			$this->bdd->exec("UPDATE attribut SET  nom ='$nom', dpart ='$idD' WHERE idAttrib ='$id'");
	
		}

		public function supr()
		{
			echo $id = $this->getId();
			
			$this->bdd->exec("DELETE FROM attribut WHERE idAttrib = $id");
	
		}
	}
?>