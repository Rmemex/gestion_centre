<?php 
	class Userlog 
	{
		private $id;
		private $idU;
		private $login;
		private $logout;
		
		function __construct(){}

		public function getId()
		{
			return $this->id;
		}
		public function setId($nvid)
		{
			$this->id = $nvid;
		}

		public function getIduser()
		{
			return $this->idUser;
		}
		public function setIduser($nvIdu)
		{
			$this->idUser = $nvIdu;
		}

		public function getLogin()
		{
			return $this->login;
		}
		public function setLogin($nvlog)
		{
			$this->login = $nvlog;
		}

		public function getLogout()
		{
			return $this->logout;
		}
		public function setLogout($nvlogout)
		{
			$this->logout = $nvlogout;
		}
	}
 ?>