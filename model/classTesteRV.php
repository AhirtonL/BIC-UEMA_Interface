<?

class TesteRogerVerdier {

	public function inserirTesteMdl() { 		  
		
			$sql = 
				"INSERT INTO
					  tbl_teste (
					  int_usuarioid,
					  chr_resposta1,
					  chr_resposta2,
					  chr_resposta3,
					  chr_resposta4,
					  chr_resposta5,
					  chr_resposta6,
					  chr_resposta7,
					  chr_resposta8,
					  chr_resposta9,
					  chr_resposta10,
					  chr_resposta11,
					  chr_resposta12,
					  chr_resposta13,
					  chr_resposta14,
					  chr_resposta15)
				 VALUES(
					   $_SESSION[usuarioId],
					  '$_SESSION[resposta1]',
					  '$_SESSION[resposta2]',
					  '$_SESSION[resposta3]',
					  '$_SESSION[resposta4]',
					  '$_SESSION[resposta5]',
					  '$_SESSION[resposta6]',
					  '$_SESSION[resposta7]',
					  '$_SESSION[resposta8]',
					  '$_SESSION[resposta9]',
					  '$_SESSION[resposta10]',
					  '$_SESSION[resposta11]',
					  '$_SESSION[resposta12]',
					  '$_SESSION[resposta13]',
					  '$_SESSION[resposta14]',
					  '$_SESSION[resposta15]')";
			
			$objConexao = new ConexaoMysql();
			$result = $objConexao->sql($sql);
			
			$retorno = array();
			$retorno[0] = $objConexao->id();
			
			if (!mysql_error()) {
				$retorno[1] = "ok";
			}else{
				$retorno[1] = "Erro na inser��o do teste!";
			}
			
			return $retorno;		  
					  
		}
		
		
		public function gerarResultadoTesteMdl() { 		  
		
			$sql = 
				"SELECT 
				  b.str_nome,
				  b.str_email,
				  b.str_fone,
				  c.str_descricao,
				  a.chr_resposta1,
				  a.chr_resposta2,
				  a.chr_resposta3,
				  a.chr_resposta4,
				  a.chr_resposta5,
				  a.chr_resposta6,
				  a.chr_resposta7,
				  a.chr_resposta8,
				  a.chr_resposta9,
				  a.chr_resposta10,
				  a.chr_resposta11,
				  a.chr_resposta12,
				  a.chr_resposta13,
				  a.chr_resposta14,
				  a.chr_resposta15
				FROM
				  tbl_teste a
				  INNER JOIN tbl_usuario b ON (a.int_usuarioid = b.int_usuarioid)
				  INNER JOIN tbl_turma c ON (b.int_turmaid = c.int_turmaid)
				WHERE
				  b.int_usuarioid = $_SESSION[usuarioId]";
			
			$objConexao = new ConexaoMysql();
			$result = $objConexao->sql($sql);
			$row = mysql_fetch_array($result);
			
			$retorno = array();
			$retorno[1] =  $row['str_nome'];
			$retorno[2] =  $row['str_email'];
			$retorno[3] =  $row['str_descricao'];
			$retorno[4] =  $row['chr_resposta1'];
			$retorno[5] =  $row['chr_resposta2'];
			$retorno[6] =  $row['chr_resposta3'];
			$retorno[7] =  $row['chr_resposta4'];
			$retorno[8] =  $row['chr_resposta5'];
			$retorno[9] =  $row['chr_resposta6'];
			$retorno[10] =  $row['chr_resposta7'];
			$retorno[11] =  $row['chr_resposta8'];
			$retorno[12] =  $row['chr_resposta9'];
			$retorno[13] =  $row['chr_resposta10'];
			$retorno[14] =  $row['chr_resposta11'];
			$retorno[15] =  $row['chr_resposta12'];
			$retorno[16] =  $row['chr_resposta13'];
			$retorno[17] =  $row['chr_resposta14'];
			$retorno[18] =  $row['chr_resposta15'];
			
			if (!mysql_error()) {
				$retorno[0] = "ok";
			}else{
				$retorno[0] = "Erro na sele��o do teste!";
			}
			
			/**** Regras de RV ***/
			
			//Emotivo n�o emotivo
			if(($retorno[5] == "S")) {
				$contaEmo = $contaEmo + 1;
			}
			if(($retorno[7] == "S")) {
				$contaEmo = $contaEmo + 1;
			}
			if(($retorno[10] == "S")) {
				$contaEmo = $contaEmo + 1;
			}
			if(($retorno[11] == "S")) {
				$contaEmo = $contaEmo + 1;
			}
			if(($retorno[17] == "S")) {
				$contaEmo = $contaEmo + 1;
			}
			
			if($contaEmo >= 3) { 
				$perfil1 = "emotivo";
			} else { 
				$perfil1 = "nemotivo";
			}
			
			//Ativo n�o ativo
			if(($retorno[6] == "S")) {
				$contaAti = $contaAti + 1;
			}
			if(($retorno[9] == "S")) {
				$contaAti = $contaAti + 1;
			}
			if(($retorno[13] == "S")) {
				$contaAti = $contaAti + 1;
			}
			if(($retorno[14] == "S")) {
				$contaAti = $contaAti + 1;
			}
			if(($retorno[16] == "S")) {
				$contaAti = $contaAti + 1;
			}
			
			if($contaAti >= 3) { 
				$perfil2 = "ativo";
			} else { 
				$perfil2 = "nativo";
			}
			
			//RSecundario RPrimaria
			if(($retorno[4] == "S")) {
				$contaR = $contaR + 1;
			}
			if(($retorno[8] == "S")) {
				$contaR = $contaR + 1;
			}
			if(($retorno[12] == "S")) {
				$contaR = $contaR + 1;
			}
			if(($retorno[15] == "S")) {
				$contaR = $contaR + 1;
			}
			if(($retorno[18] == "S")) {
				$contaR = $contaR + 1;
			}
			
			if($contaR >= 3) { 
				$perfil3 = "rsecundario";
			} else { 
				$perfil3 = "rprimario";
			}
			
			
			if(($perfil1 == "emotivo") and ($perfil2 == "nativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Inst�vel";
				$retorno[23] = "pessoas com elevado n�mero e variedade de disposi��es. Inclina��o para as artes, necessidade de distra��es, pouca pontualidade, tend�ncia � ociosidade e � contradi��o. Tem inclina��o ao ci�me, distra�do, agressivo, irrit�vel, pregui�oso, tem pouco dom�nio pessoal, depende muito do corpo, gosta de mudan�as, de divers�es e conversas.";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "nativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Amorfo";
				$retorno[23] = "Interessa-se pelas alegrias e prazeres sensoriais. � d�cil, situa-se no p�lo oposto do l�der, tem falta de iniciativa e entusiasmo, sossegado, indiferente, impass�vel e equilibrado, objetivo, tolerante, � �boa pessoa�, negligente, pouca necessidade de a��o, gosta dos prazeres da mesa, teimoso, ego�sta, pouco servi�al.";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "ativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Social";
				$retorno[23] = "pessoa com aptid�es pr�ticas, voltadas para o �til, esp�rito cient�fico, deixa-se guiar pela raz�o, rea��es r�pidas e decididas, sossegado, objetivo, alegre, corajoso, gosta da sociedade, franco, leal, perseverante, facilmente encontra solu��o para tudo, otimista, extrovertido. ";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "nativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "Ap�tico";
				$retorno[23] = "pessoa sossegada, indiferente, tranq�ila, disciplinada e fiel. N�o se esperem intensas emo��es ps�quicas desse tipo, nem decis�es repentinas, devido ao grau diminuto de emotividade e atividade, gosta da solid�o, teimoso, dif�cil para se reconciliar, severo e duro.";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "ativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "Fleum�tico";
				$retorno[23] = "pessoa do dever, da ordem, da medida, pondera��o, reflex�o, � te�rico, sempre ocupado, fiel, frio, decidido e perseverante. S�rio, exato, simples nos h�bitos da vida, tolerante para com as opini�es alheias, bom observador, moderado e met�dico no trabalho, pouco impulso (car�ncia de emotividade). ";
			} else if(($perfil1 == "emotivo") and ($perfil2 == "ativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "L�der";
				$retorno[23] = "pessoa de mando, de a��o. Poder e dedica��o s�o-lhe caracter�sticos. Grande capacidade de trabalho, boa capacidade de concentra��o, pr�tico, en�rgico. Resiste tenazmente. Severo para consigo e os outros. Bondoso para com os inferiores. N�o muda a opini�o formada, n�o tolera rivais, � sistem�tico. N�o se submete com facilidade. ";
			} else if(($perfil1 == "emotivo") and ($perfil2 == "ativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Ativo";
				$retorno[23] = "pessoa de a��o, af�vel, fascina, arrasta, � improvisador, n�o acumula experi�ncia, capacidade de adapta��o social, entret�m a todos, facilmente entusiasmado, servi�al, pr�tico, empreendedor, ativo. Faz muito pelos outros, mesmo com sacrif�cio.";
			} else if(($perfil1 == "emotivo") and ($perfil2 == "nativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "Melanc�lico";
				$retorno[23] = "� introvertido, solit�rio, suscet�vel, impression�vel, escrupuloso, retra�do, desconfi�vel, hesitante, t�mido, falta de habilidade na vida pr�tica, sonha grandes planos que n�o realiza. Contenta-se com o saber te�rico, sem visar-lhe a aplica��o pr�tica. Fechado, voltado para si mesmo, s�rio. Gosta da natureza. Pouca persist�ncia, desanima facilmente no trabalho, n�o encarna as ocupa��es.";
			} 
			
			$retorno[20] = $perfil1;
			$retorno[21] = $perfil2;
			$retorno[22] = $perfil3;
			
			return $retorno;		  
					  
		}	
		
		
		function gravarPerfil($perfil) { 
			$sqlU = 
			"
				UPDATE
				  tbl_teste
				SET
				  str_perfil = '$perfil'
				WHERE 
				int_UsuarioId = $_SESSION[usuarioId]
			";
			
			$objConexao = new ConexaoMysql();
			
			$resultU = $objConexao->sql($sqlU);
		} 
			  
}			  
?>