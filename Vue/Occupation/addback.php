<?php
	include("../../Controle/controlOccupation.php");

	     $Oc = new ControlOccupation();
	
		$lbl = $_POST['spec'];

		echo $lbl.'<br>';

	$Oc->inscrire($lbl);
	
	header("location:occupation.php");
?>