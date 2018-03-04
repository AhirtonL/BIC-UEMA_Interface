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
				$retorno[1] = "Erro na inserção do teste!";
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
				$retorno[0] = "Erro na seleção do teste!";
			}
			
			/**** Regras de RV ***/
			
			//Emotivo não emotivo
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
			
			//Ativo não ativo
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
				$retorno[19] = "Instável";
				$retorno[23] = "pessoas com elevado número e variedade de disposições. Inclinação para as artes, necessidade de distrações, pouca pontualidade, tendência à ociosidade e à contradição. Tem inclinação ao ciúme, distraído, agressivo, irritável, preguiçoso, tem pouco domínio pessoal, depende muito do corpo, gosta de mudanças, de diversões e conversas.";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "nativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Amorfo";
				$retorno[23] = "Interessa-se pelas alegrias e prazeres sensoriais. É dócil, situa-se no pólo oposto do líder, tem falta de iniciativa e entusiasmo, sossegado, indiferente, impassível e equilibrado, objetivo, tolerante, é “boa pessoa”, negligente, pouca necessidade de ação, gosta dos prazeres da mesa, teimoso, egoísta, pouco serviçal.";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "ativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Social";
				$retorno[23] = "pessoa com aptidões práticas, voltadas para o útil, espírito científico, deixa-se guiar pela razão, reações rápidas e decididas, sossegado, objetivo, alegre, corajoso, gosta da sociedade, franco, leal, perseverante, facilmente encontra solução para tudo, otimista, extrovertido. ";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "nativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "Apático";
				$retorno[23] = "pessoa sossegada, indiferente, tranqüila, disciplinada e fiel. Não se esperem intensas emoções psíquicas desse tipo, nem decisões repentinas, devido ao grau diminuto de emotividade e atividade, gosta da solidão, teimoso, difícil para se reconciliar, severo e duro.";
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "ativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "Fleumático";
				$retorno[23] = "pessoa do dever, da ordem, da medida, ponderação, reflexão, é teórico, sempre ocupado, fiel, frio, decidido e perseverante. Sério, exato, simples nos hábitos da vida, tolerante para com as opiniões alheias, bom observador, moderado e metódico no trabalho, pouco impulso (carência de emotividade). ";
			} else if(($perfil1 == "emotivo") and ($perfil2 == "ativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "Líder";
				$retorno[23] = "pessoa de mando, de ação. Poder e dedicação são-lhe característicos. Grande capacidade de trabalho, boa capacidade de concentração, prático, enérgico. Resiste tenazmente. Severo para consigo e os outros. Bondoso para com os inferiores. Não muda a opinião formada, não tolera rivais, é sistemático. Não se submete com facilidade. ";
			} else if(($perfil1 == "emotivo") and ($perfil2 == "ativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Ativo";
				$retorno[23] = "pessoa de ação, afável, fascina, arrasta, é improvisador, não acumula experiência, capacidade de adaptação social, entretém a todos, facilmente entusiasmado, serviçal, prático, empreendedor, ativo. Faz muito pelos outros, mesmo com sacrifício.";
			} else if(($perfil1 == "emotivo") and ($perfil2 == "nativo") and ($perfil3 == "rsecundario")) { 
				$retorno[19] = "Melancólico";
				$retorno[23] = "é introvertido, solitário, suscetível, impressionável, escrupuloso, retraído, desconfiável, hesitante, tímido, falta de habilidade na vida prática, sonha grandes planos que não realiza. Contenta-se com o saber teórico, sem visar-lhe a aplicação prática. Fechado, voltado para si mesmo, sério. Gosta da natureza. Pouca persistência, desanima facilmente no trabalho, não encarna as ocupações.";
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