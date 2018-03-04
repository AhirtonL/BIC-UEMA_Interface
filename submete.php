<?
session_start();
?>
<link href="includes/estilom.css" rel="stylesheet" type="text/css">
<link href="includes/style_form.css" rel="stylesheet" type="text/css"><br />
<link href="includes/style.css" rel="stylesheet" type="text/css">
<?
include("control/controle.php");

$acao = $_POST[acao];
	
if($acao == "cadastroUsuarioTest") {  
	
	$_SESSION[nome] = $_POST[nome];
	$_SESSION[cpf] = $_POST[cpf];
	$_SESSION[email] = $_POST[email];
	$_SESSION[fone] = $_POST[fone];
	$_SESSION[turmaid] = $_POST[turmaid];
	
	$_SESSION[resposta1] = $_POST[resposta1];
	$_SESSION[resposta2] = $_POST[resposta2];
	$_SESSION[resposta3] = $_POST[resposta3];
	$_SESSION[resposta4] = $_POST[resposta4];
	$_SESSION[resposta5] = $_POST[resposta5];
	$_SESSION[resposta6] = $_POST[resposta6];
	$_SESSION[resposta7] = $_POST[resposta7];
	$_SESSION[resposta8] = $_POST[resposta8];
	$_SESSION[resposta9] = $_POST[resposta9];
	$_SESSION[resposta10] = $_POST[resposta10];
	$_SESSION[resposta11] = $_POST[resposta11];
	$_SESSION[resposta12] = $_POST[resposta12];
	$_SESSION[resposta13] = $_POST[resposta13];
	$_SESSION[resposta14] = $_POST[resposta14];
	$_SESSION[resposta15] = $_POST[resposta15];
	
	$objControl = new Controle();
	
	$retorno = array();
	
	$retorno = $objControl->inserirUsuarioTestCtrl();
	
?>
<table width="955" style="border:1px #FFFFFFF solid;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20">&nbsp;</td>
    <td class="style8">RESULTADO DO TESTE ROGER VERDIER</td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="style14"><b>O seu Perfil é </b> <?= $retorno[19]; ?></td>
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
<?		

}
?>
