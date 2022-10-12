<?php 
	include("../../Modele/Transaction/transUser.php");
	
	class ControlUser
	{
		private $transUs;
		function __construct(){ 
			$this->transUs = new TransUser();
		}
		public function getId()
		{
			return $this->transUs->getId();	
		}

		public function affiche()
		{
			return $this->transUs->affiche();
		}
		
		public function supprimer($idU)
		{
			$this->transUs->setId($idU);
			$this->transUs->delete();
		}
		
		public function inscrire($userid, $login, $email, $pass,$fonct)
		{
			$this->transUs->setUid($userid);
			$this->transUs->setLogin($login);
			$this->transUs->setMail($email);
			$this->transUs->setPass($pass);
			$this->transUs->setFonct($fonct);
			
			$this->transUs->ajouter();
		}

		public function modifier($idU,$userid, $login, $email, $pass,$fonct)
		{
			$this->transUs->setUid($userid);
			$this->transUs->setLogin($login);
			$this->transUs->setMail($email);
			$this->transUs->setPass($pass);
			$this->transUs->setFonct($fonct);
			
			$this->transUs->ajouter();
		}
	}
	