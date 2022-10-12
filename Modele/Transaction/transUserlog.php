<?php 
	include_once("../../Modele/Connexion/connexion.php");
	include_once("../../Modele/Entite/userlog.php");

	class TransUserlog extends Userlog
	{
		private $bdd;

		function __construct(){
			$con = new Connexion();
			$this->bdd = $con->getCon();
			
		}

		public function affiche()
		{
			$req = $this->bdd->query("SELECT user.login identifiant, userlog.id, userlog.logintime login, userlog.logout FROM user INNER JOIN userlog WHERE user.userid = userlog.idU");
			return $req;
		}
	}
?>