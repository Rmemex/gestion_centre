<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/user.php");

	class TransUser extends User
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();	
		}

		public function affiche()
		{
			$req = $this->bdd->query("SELECT * FROM user");
			return $req;
		}

		public function ajouter()
		{
			$userid = $this->getUid();
			$login = $this->getLogin();
			$email = $this->getMail();
			$pass = $this->getPass();
			$fonct = $this->getFonct();

			$this->bdd->exec("INSERT INTO user (id,userid, login, email, pass, fonction) VALUES (NULL, '$userid','$login', '$email','$pass', '$fonct')");
		}

		public function modifier()
		{
			$id = $this->getId();
			$email = $this->getMail();
			$pass = $this->getPass();

			$this->bdd->exec("UPDATE user SET pass ='$pass' WHERE id = '$id' AND email='$email'");
		}

		public function delete()
		{
			 $id = $this->getId();
			 $this->bdd->exec("DELETE FROM user WHERE id = '$id'");
		}
	}
?>