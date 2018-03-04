<?
session_start();

$msg = $_GET[msg];

if($msg == '') { 
	unset($_SESSION[nome]);
	unset($_SESSION[cpf]);
	unset($_SESSION[email]);
	unset($_SESSION[fone]);
	unset($_SESSION[turmaid]);
	unset($_SESSION[resposta1]);
	unset($_SESSION[resposta2]);
	unset($_SESSION[resposta3]);
	unset($_SESSION[resposta4]);
	unset($_SESSION[resposta5]);
	unset($_SESSION[resposta6]);
	unset($_SESSION[resposta7]);
	unset($_SESSION[resposta8]);
	unset($_SESSION[resposta9]);
	unset($_SESSION[resposta10]);
	unset($_SESSION[resposta11]);
	unset($_SESSION[resposta12]);
	unset($_SESSION[resposta13]);
	unset($_SESSION[resposta14]);
	unset($_SESSION[resposta15]);
	unset($_SESSION[usuarioId]);
} else { 
	$imgEx = "<img src='images/required.gif' />";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>  
<script type="text/javascript" src="includes/tmt_core.js"></script> 
<script type="text/javascript" src="includes/tmt_form.js"></script> 
<script type="text/javascript" src="includes/tmt_validator.js"></script>   
<script type="text/javascript" src="includes/jquery1.3.js"></script>  
<link href="includes/estilom.css" rel="stylesheet" type="text/css">
<link href="includes/style_form.css" rel="stylesheet" type="text/css"><br />
<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="submete.php" method="post" tmt:validate="true"> 
<input name="acao" type="hidden" value="cadastroUsuarioTest" />
<div align="center" class="error">
<?
	echo $msg;
?>
</div>
<table align="center" width="955" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="style18" colspan="3"><img src="images/topo.jpg" width="955" border="0" /></td>
  </tr>
  <tr>
    <td class="style8">&nbsp;</td>
    <td class="style8" height="30">DADOS PESSOAIS </td>
    <td class="style8">&nbsp;</td>
  </tr>
  <tr>
    <td height="10" colspan="3"></td>
  </tr>
  <tr>
    <td bgcolor="#f3f3f3" class="style1">&nbsp;</td>
    <td bgcolor="#f3f3f3" class="style1">Nome Completo </td>
    <td bgcolor="#f3f3f3" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="text" name="nome" value="<?= $_SESSION[nome] ?>" size="70" maxlength="80" class="required" tmt:required="true" tmt:errorclass="invalid" tmt:message="Por favor, insira seu Nome Completo" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f3f3f3" class="style1">&nbsp;</td>
    <td bgcolor="#f3f3f3" class="style1">CPF <span class="style2"> (Só números)</span> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="text" id="cpf" name="cpf" value="<?= $_SESSION[cpf] ?>" size="20" maxlength="11" class="required" tmt:required="true" tmt:pattern="positiveinteger" tmt:errorclass="invalid" tmt:message="Por favor, insira um CPF válido (só números)." />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f3f3f3" class="style1">&nbsp;</td>
    <td bgcolor="#f3f3f3" class="style1">E-mail</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="text" id="email" name="email" value="<?= $_SESSION[email] ?>" size="70" maxlength="80"  class="required" tmt:required="true" tmt:errorclass="invalid" tmt:message="Por favor, insira um email válido" tmt:pattern="email" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f3f3f3" class="style1">&nbsp;</td>
    <td bgcolor="#f3f3f3" class="style1">DDD Fone  <span class="style2"> (Só números)</span>  </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="text" name="fone" value="<?= $_SESSION[fone] ?>" size="20" maxlength="10" class="required" tmt:required="true" tmt:errorclass="invalid" tmt:message="Por favor, insira o seu telefone de contato" tmt:pattern="positiveinteger" tmt:filters="numbersonly" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f3f3f3" class="style1">&nbsp;</td>
    <td bgcolor="#f3f3f3" class="style1">Turma</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <? 
	$select = "turmas";
	include("includes/selects.php");
	?>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="style8">&nbsp;</td>
    <td class="style8" height="30"> TESTE ROGER VERDIER </td>
    <td width="20" class="style8">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="styleV">&nbsp;</td>
    <td class="styleV"> * Caro aluno, utilizando o mouse, marque a coluna do Sim ou do N&atilde;o, segundo tiver ou nï¿½o a caracter&iacute;stica indicada. Preste muita aten&ccedil;&atilde;oparte em negrito das perguntas. Antes de responder, leia atentamente toda a frase. <br />
       <div align="right"> IRM&Atilde;O HENRIQUE JUSTO, F. S. C, 9 edi&ccedil;&atilde;o, 1966.</div> <br />  </td>
    <td width="20" class="styleV">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" bgcolor="#f3f3f3" class="style1">&nbsp;</td>
    <td bgcolor="#f3f3f3" class="style1"><span class="style1">1 - Depois de uma emo&ccedil;&atilde;o, fica impressionado por muito tempo? Gosta de relembrar as emo&ccedil;&otilde;es (agrad&aacute;veis ou desagrad&aacute;veis) do passado? <br />
    </span></td>
    <td width="20" bgcolor="#f3f3f3" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td>
	<table width="200">
      <tr>
        <td><span class="style2">
          <label>
          	<input type="checkbox" <? if($_SESSION[resposta1] == 'S') { echo 'checked'; } ?>  name="resposta1" value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 01." />
          	Sim
          </label>
          	&nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          	<input type="checkbox" <? if($_SESSION[resposta1] == 'N') { echo 'checked'; } ?>  name="resposta1" value="N" />
          	N&atilde;o
          </label>
          </span>
          </td>
      </tr>
    </table>    </td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" bgcolor="#f3f3f3" class="style1">&nbsp;</td>
    <td bgcolor="#f3f3f3" class="style1">2 - Fica facilmente acanhado na presen&ccedil;a de pessoas?</td>
    <td width="20" bgcolor="#f3f3f3" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta2" <? if($_SESSION[resposta2] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 02." />
          Sim
          </label>
          	&nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta2" <? if($_SESSION[resposta2] == 'N') { echo 'checked'; } ?>  value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="style1">&nbsp;</td>
    <td class="style1">3 - Come&ccedil;a geralmente pelo trabalho que tem de ser feito, deixando o resto para depois?<br /></td>
    <td width="20" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta3" <? if($_SESSION[resposta3] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 03." />
          Sim
          </label>
      	  &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta3" <? if($_SESSION[resposta3] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="style1">&nbsp;</td>
    <td class="style1">4 - Fica muitas vezes e facilmente emocionado? Empalidece, cora, chora, ri, fica nervoso, assusta-se? Bate o cora&ccedil;&atilde;o? Fecha-se a garganta?<br /></td>
    <td width="20" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta4" <? if($_SESSION[resposta4] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 04." />
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta4" <? if($_SESSION[resposta4] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="style1">&nbsp;</td>
    <td class="style1">5 - Pensa de antem&atilde;o no que pode acontecer, e prepara-se, tanto quanto poss&iacute;vel, com anteced&ecirc;ncia, para a nova situa&ccedil;&atilde;o?<br /></td>
    <td width="20" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta5" <? if($_SESSION[resposta5] == 'N') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 05." />
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta5" <? if($_SESSION[resposta5] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="style1">&nbsp;</td>
    <td class="style1">6 - Procura resolver sozinho as dificuldades, sem ajuda? <br /></td>
    <td width="20" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta6" <? if($_SESSION[resposta6] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 06." />
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta6" <? if($_SESSION[resposta6] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="style1">&nbsp;</td>
    <td class="style1">7 - &Eacute; suscet&iacute;vel? Melindra-se facilmente?</td>
    <td width="20" class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta7" <? if($_SESSION[resposta7] == 'S') { echo 'checked'; } ?>  value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 07." />
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta7" <? if($_SESSION[resposta7] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">8 - Muda facilmente de humor? Isto &eacute;, passando da alegria para a tristeza, da tagarelice para o mutismo, do entusiasmo ao des&acirc;nimo? <br /></td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2">
          <label>
          	<input type="checkbox" name="resposta8" <? if($_SESSION[resposta8] == 'S') { echo 'checked'; } ?>  value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 08." />
          	Sim
          </label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          	<input type="checkbox" name="resposta8" <? if($_SESSION[resposta8] == 'N') { echo 'checked'; } ?> value="N" />
          	N&atilde;o
          </label></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">9 - Leva tempo para se habituar em caso de mudan&ccedil;a? (De casa, localidade, escola?)</td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta9" <? if($_SESSION[resposta9] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 09." />
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta9" <? if($_SESSION[resposta9] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">10 - Num trabalho prolongado, aplica-se no fim tanto quanto no come&ccedil;o? </td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta10" <? if($_SESSION[resposta10] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 10." />
          Sim
          </label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta10" <? if($_SESSION[resposta10] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">11 - Quando est&aacute; livre, procura n&atilde;o passatempos, distra&ccedil;&otilde;es, divertimentos, mas trabalhos, ocupa&ccedil;&otilde;es?</td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta11" <? if($_SESSION[resposta11] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 11."/>
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta11" <? if($_SESSION[resposta11] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">12 - Gosta de conservar os mesmos h&aacute;bitos (costumes), os mesmos amigos, os mesmos objetos, etc.?</td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta12" <? if($_SESSION[resposta12] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 12." />
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta12" <? if($_SESSION[resposta12] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">13 - Em caso de dificuldade ou fracasso, em vez de desanimar, recome&ccedil;a tantas vezes quantas for necess&aacute;rio?<br /></td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta13" <? if($_SESSION[resposta13] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 13." />
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta13" <? if($_SESSION[resposta13] == 'N') { echo 'checked'; } ?> value="N" />
          <span class="style2">N</span>&atilde;o</label></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">14 - Comove-se ao ouvir ou ler um fato emocionante quase tanto quanto diante de acontecimento real?</td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta14" <? if($_SESSION[resposta14] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 14."/>
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta14" <? if($_SESSION[resposta14] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1">&nbsp;</td>
    <td class="style1">15 - Demora para se reconciliar? (Depois de uma desaven&ccedil;a, afronta, etc.?)</td>
    <td class="style1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td><table width="200">
      <tr>
        <td class="style2"><label>
          <input type="checkbox" name="resposta15" <? if($_SESSION[resposta15] == 'S') { echo 'checked'; } ?> value="S" tmt:minchecked="1" tmt:maxchecked="1" tmt:message="Por favor, selecione apenas uma opção na questão 15."/>
          Sim</label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="checkbox" name="resposta15" <? if($_SESSION[resposta15] == 'N') { echo 'checked'; } ?> value="N" />
          N&atilde;o</label></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
    <tr>
		<td></td>
        <td align="center" class="style2">
		  <label>
  		  <input type="submit" value="Submeter Avaliação" />
          </label></td>
      </tr>
    </table>
</td>
    <td width="20">&nbsp;</td>
  </tr>
  
</table>
</form>
</body>
</html>
