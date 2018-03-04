<?
    include("control/controle.php");
	
	$objControl = new Controle();
	
	$retorno = array();
	
	$retorno = $objControl->iniciarFormacao();
	
?>