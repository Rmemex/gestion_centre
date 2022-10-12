<?php 
	include_once("../../Modele/Transaction/transPatient.php");
	
	class ControlPatient
	{
		private $transPat;
		
		function __construct(){
			$this->transPat = new TransPatient();

		}

		public function getPat()
		{
			return $this->transPat->getPat();	
		}
		
		public function affiche($idPat)
		{
			$this->transPat->setIm($idPat);
			return $this->transPat->affiche();
		}

		public function inscrire($im,$nom,$prenom,$depart,$attrib,$sexe,$dates,$num,$adresse)
		{
			$this->transPat->setIm($im);
			$this->transPat->setNom($nom);
			$this->transPat->setPrenom($prenom);
			$this->transPat->setDepart($depart);
			$this->transPat->setAttrib($attrib);
			$this->transPat->setSexe($sexe);
			$this->transPat->setDates($dates);
			$this->transPat->setNum($num);
			$this->transPat->setAd($adresse);

			$this->transPat->ajouter();
		}

		public function modifier($idPat,$im,$nom,$prenom,$depart,$attrib,$sexe,$dates,$num,$adresse)
		{
			$this->transPat->setId($idPat);
			$this->transPat->setIm($im);
			$this->transPat->setNom($nom);
			$this->transPat->setPrenom($prenom);
			$this->transPat->setDepart($depart);
			$this->transPat->setAttrib($attrib);
			$this->transPat->setSexe($sexe);
			$this->transPat->setDates($dates);
			$this->transPat->setNum($num);
			$this->transPat->setAd($adresse);
			
			$this->transPat->modifier();
		}

		public function supprimer($idPat)
		{
			$this->transPat->setId($idPat);
			$this->transPat->supr();
		}

		public function rechercher($idPat)
		{ 
			$this->transPat->setId($idPat);
			$req = $this->transPat->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>