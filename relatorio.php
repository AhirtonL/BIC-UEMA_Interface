<?
	session_start();
	include("control/controle.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>  
<script type="text/javascript" src="includes/jquery1.3.js"></script>  
<link href="includes/estilom.css" rel="stylesheet" type="text/css">
<link href="includes/style_form.css" rel="stylesheet" type="text/css"><br />
<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?
		$objControl = new Controle();
	
        $retorno = array();
        $retorno = $objControl->retornarUsuarioTeste();
?>
<table width="955" style="border:1px #FFFFFFF solid;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20">&nbsp;</td>
    <td class="style8">RESULTADO DO TESTE ROGER VERDIER</td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="style14"><b>O seu Perfil e: </b> <?= $retorno[19]; ?></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td class="style1"><b><?= $retorno[19]; ?>: </b> <?= $retorno[23]; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td class="style1"><b>Nome:</b> <?= $retorno[1]; ?></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="style1"><b>Email:</b> <?= $retorno[2]; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="style1"><b>Turma:</b> <?= $retorno[3]; ?></td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td>&nbsp;</td>
    <td class="style1"><b>Baseando-se nos comportamentos:</b> <?= $retorno[20]; ?>, <?= $retorno[21]; ?>, <?= $retorno[22]; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


      
</body>
</html>
