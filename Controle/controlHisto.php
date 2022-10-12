<?php 
	include_once("../../Modele/Transaction/transHisto.php");
	
	class ControlHist
	{
		private $transhisp;
		
		function __construct(){
			$this->transhisp = new TransHisto();

		}
		
		public function affiche($idPat)
		{
			 $this->transhisp->setId($idPat);
			return $this->transhisp->affiche();
		}

		public function inscrire($idpat,$idDoc,$poids,$tension,$glycemie,$temperature,$signe,$maladie,$date,$allergie,$presc)
		{
			$this->transhisp->setIdpat($idpat);
			$this->transhisp->setIdDoc($idDoc);
			$this->transhisp->setPoids($poids);
			$this->transhisp->setTension($tension);
			$this->transhisp->setGlyc($glycemie);
			$this->transhisp->setTemper($temperature);
			$this->transhisp->setSigne($signe);
		    $this->transhisp->setMaladie($maladie );
			$this->transhisp->setDat($date);
			$this->transhisp->setAller($allergie);
			$this->transhisp->setPresc($presc);

			$this->transhisp->ajouter();
		}

		public function modifier($idHis,$idpat,$idDoc,$poids,$tension,$glycemie,$temperature,$signe,$maladie,$date,$allergie,$presc)
		{
			$this->transhisp->setId($idHis);
			$this->transhisp->setIdpat($idpat);
			$this->transhisp->setIdDoc($idDoc);
			$this->transhisp->setPoids($poids);
			$this->transhisp->setTension($tension);
			$this->transhisp->setGlyc($glycemie);
			$this->transhisp->setTemper($temperature);
			$this->transhisp->setSigne($signe);
		    $this->transhisp->setMaladie($maladie );
			$this->transhisp->setDat($date);
			$this->transhisp->setAller($allergie);
			$this->transhisp->setPresc($presc);
			
			$this->transhisp->modifier();
		}

		public function supprimer($idHis)
		{
			$this->transhisp->setId($idHis);
			
			$this->transhisp->supr();
		}

		public function rechercher($idHis)
		{ 
			$this->transhisp->setId($idHis);
			$req = $this->transhisp->search();
			$res = $req->fetch();
			return $res;
		}
		

	}
?>