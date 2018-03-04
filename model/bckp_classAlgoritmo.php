<?

class TesteRogerVerdier {

		public function formarGrupos() { 		  
		
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
				  INNER JOIN tbl_turma c ON (b.int_turmaid = c.int_turmaid)";
			
			
			$objConexao = new ConexaoMysql();
			$result = $objConexao->sql($sql);
			$row = mysql_fetch_array($result);
			
			$retorno = array();
			$retorno[1] =  $row['str_nome'];
			$retorno[2] =  $row['str_email'];
			
			// Definição dos centróides
			$centroide1 = "lider";
			$centroide2 = "social";
			$centroide3 = "ativo";
			
			$grupo = array();
			
			//Define a quantidade de alunos no grupo (personalizar na interface)
			$qtdeAlunosPorGrupo = 5;
			
			//Conta a quantidade de alunos (Loop)
			$qtdeTotalAlunos = 45;
			
			//Gera a quantidade de grupos
			$qtdeGrupos = $qtdeTotalAlunos / $qtdeAlunosPorGrupo;
			
			//Contador para limitar a formação dos grupos
			$contGrupoAluno = 1;
						
				/** 2. Agrupar os centroides em um grupo de acordo com o número total de grupos **/

				//Varrer os alunos e recuperar os centroide1 (líderes)
				for($i = 1; $i < qtdeTotalAlunos; $i++) {
					if($temperamento = "lider") and ($contGrupoAluno <= $qtdeGrupos) { 
							//formar 1 grupo para cada lider
							$grupo[$contGrupoAluno] = "lider";
							
							$contGrupoAluno = $contGrupoAluno + 1;
					} 
				}	
				
				
				
				/** Retirar os alunos já agrupados **/
				
				/** **/
				
				//Varrer os alunos e recuperar os centroide2 (social)
				for($i = 1; $i < qtdeTotalAlunos; $i++) {  
					if($temperamento = "social")  and ($contGrupoAluno <= $qtdeGrupos) {
						//formar 1 grupo para cada social
						$grupo[$contGrupoAluno] = "social";
						
						$contGrupoAluno = $contGrupoAluno + 1;
					} 
				}	
				
				//Varrer os alunos e recuperar os centroide3 (ativo)
				for($i = 1; $i < qtdeTotalAlunos; $i++) {  
					if($temperamento = "ativo")  and ($contGrupoAluno <= $qtdeGrupos) {
						//formar 1 grupo para cada ativo
						$grupo[$contGrupoAluno] = "ativo";
						
						$contGrupoAluno = $contGrupoAluno + 1;
					} 
				}	
				/** Fim do agrupamento dos centróides **/
				
				/** 3. Agregação dos grupos **/
				
				//Varrer os alunos e distribuir nos grupos
				for($i = 1; $i < qtdeTotalAlunos; $i++) {
					for($x = 1; $x < $qtdeGrupos; $x++) {  
						
						// Verifica quem é o centroide do grupo para distribuir
						if($grupo[x] = "lider"){ 
							//temperamentos afins do lider
							if($temperamentoAluno[i] = "fleumatico") or ($temperamentoAluno[i] = "melancolico") or ($temperamentoAluno[i] = "ativo") { 
								//adiciona nos grupos os tipos afins						
							} 
						
						} else if($grupo[x] = "social") {
							//temperamentos afins do social
							if($temperamentoAluno[i] = "amorfo") or ($temperamentoAluno[i] = "ativo") or ($temperamentoAluno[i] = "fleumatico") { 
								//adiciona nos grupos os tipos afins
							}
						
						} else if($grupo[x] = "ativo") {
							//temperamentos afins do social
							if($temperamentoAluno[i] = "instavel") or ($temperamentoAluno[i] = "social") or ($temperamentoAluno[i] = "lider") { 
								//adiciona nos grupos os tipos afins
							}
						}
						
 					}
					
				}	
				
				/** Fim do da Agregação dos grupos **/
				
				
				
			
			if(($perfil1 == "emotivo") and ($perfil2 == "nativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Instável";
				
			} else if(($perfil1 == "nemotivo") and ($perfil2 == "nativo") and ($perfil3 == "rprimario")) { 
				$retorno[19] = "Amorfo";
				
			}
			
			return $retorno;		  
					  
		}	
		
		
			  
}			  
?>