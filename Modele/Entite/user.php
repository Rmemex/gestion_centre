<?php 
	class User 
	{
		private $id;
		private $userid;
		private $login;
		private $email;
		private $pass;
		private $fonct;
		private $statut;
		
		function __construct(){}

		public function getId()
		{
			return $this->id;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}

		public function getUid()
		{
			return $this->userid;
		}
		public function setUId($nid)
		{
			$this->userid = $nid;
		}

		public function getLogin()
		{
			return $this->login;
		}
		public function setLogin($log)
		{
			$this->login = $log;
		}

		public function getMail()
		{
			return $this->email;
		}
		public function setMail($mail)
		{
			$this->email = $mail;
		}

		public function getPass()
		{
			return $this->pass;
		}
		public function setPass($mdp)
		{
			$this->pass = $mdp;
		}

		public function getFonct()
		{
			return $this->fonct;
		}
		public function setFonct($fct)
		{
			$this->fonct = $fct;
		}

		public function getStat()
		{
			return $this->statut;
		}
		public function setStat($stat)
		{
			$this->statut = $stat;
		}
	}
 ?>