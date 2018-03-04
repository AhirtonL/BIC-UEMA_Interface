<?

class Algoritmo {

		public function formarGrupos() { 		  
		
			$sql = 
				"SELECT 
				  b.str_nome,
				  b.str_email,
				  a.int_usuarioid,
				  a.str_perfil
				FROM
				  tbl_teste a
				  INNER JOIN tbl_usuario b ON (a.int_usuarioid = b.int_usuarioid)
				  INNER JOIN tbl_turma c ON (b.int_turmaid = c.int_turmaid)";
			
			
			$objConexao = new ConexaoMysql();
			$resultado = $objConexao->sql($sql);
			//Conta a quantidade de alunos (Loop)
			$qtdeTotalAlunos = mysql_num_rows($resultado);
			$aluno = array();
			
			//Define a quantidade de alunos no grupo (personalizar na interface)
			$qtdeAlunosPorGrupo = 3;
			
			//Gera a quantidade de grupos
			$qtdeGrupos = $qtdeTotalAlunos / $qtdeAlunosPorGrupo;
			
			//Contador para limitar a forma��o dos grupos
			$contGrupoAluno = 1;
						
				/** 2. Agrupar os centroides em um grupo de acordo com o n�mero total de grupos **/
				
				//Retire os centr�ides no pr�ximo sql
				$complementoSql = $complementoSql . "WHERE a.int_usuarioid NOT IN( ";
							
				//Varrer os alunos e recuperar os centroide1 (l�deres)
				for($i = 0; $i < $qtdeTotalAlunos; $i++) {
				
					$perfil[$i] =  mysql_result($resultado,$i,str_perfil);
					$nome[$i] =  mysql_result($resultado,$i,str_nome);
					$usuarioid[$i] =  mysql_result($resultado,$i,int_usuarioid);
					
					if(($perfil[$i] == "L�der") and ($contGrupoAluno <= $qtdeGrupos)) { 
							//formar 1 grupo para cada ativo
							echo "Grupo".$contGrupoAluno."-> ";
							echo $nome[$i]." (";
							echo $centroide[$contGrupoAluno] = $perfil[$i];
							echo ") | | | ";
							
							if($contGrupoAluno == $qtdeGrupos) {	
								$complementoSql = $complementoSql . $usuarioid[$i]." ) ";
							} else { 
								$complementoSql = $complementoSql . $usuarioid[$i]." , ";
							}
							
							$contGrupoAluno++;
					} 
				}
				
				
				//Varrer os alunos e recuperar os centroide2 (social)
				for($i = 0; $i < $qtdeTotalAlunos; $i++) {
				
					$perfil[$i] =  mysql_result($resultado,$i,str_perfil);
					$nome[$i] =  mysql_result($resultado,$i,str_nome);
					$usuarioid[$i] =  mysql_result($resultado,$i,int_usuarioid);
					
					if(($perfil[$i] == "Social") and ($contGrupoAluno <= $qtdeGrupos)) { 
							//formar 1 grupo para cada social
							echo "Grupo".$contGrupoAluno."-> ";
							echo $nome[$i]." (";
							echo $centroide[$contGrupoAluno] = $perfil[$i];
							echo ") | | | ";
							
							if($contGrupoAluno == $qtdeGrupos) {	
								$complementoSql = $complementoSql . $usuarioid[$i]." ) ";
							} else { 
								$complementoSql = $complementoSql . $usuarioid[$i]." , ";
							}
														
							$contGrupoAluno++;
					} 
				}
				
				//Varrer os alunos e recuperar os centroide3 (ativo)
				for($i = 0; $i < $qtdeTotalAlunos; $i++) {
				
					$perfil[$i] =  mysql_result($resultado,$i,str_perfil);
					$nome[$i] =  mysql_result($resultado,$i,str_nome);
					$usuarioid[$i] =  mysql_result($resultado,$i,int_usuarioid);
					
					if(($perfil[$i] == "Ativo ") and ($contGrupoAluno <= $qtdeGrupos)) { 
							//formar 1 grupo para cada ativo
							echo "Grupo".$contGrupoAluno."-> ";
							echo $nome[$i]." (";
							echo $centroide[$contGrupoAluno] = $perfil[$i];
							echo ") | | | ";
							
							if($contGrupoAluno == $qtdeGrupos) {	
								$complementoSql = $complementoSql . $usuarioid[$i]." ) ";
							} else { 
								$complementoSql = $complementoSql . $usuarioid[$i]." , ";
							}
							
							$contGrupoAluno++;
					} 
				}
					
				/** 3. Agrega��o dos grupos **/
				$sqlSemCentroide = 
				"SELECT 
				  b.str_nome,
				  b.str_email,
				  a.str_perfil,
				  a.int_usuarioid
				FROM
				  tbl_teste a
				  INNER JOIN tbl_usuario b ON (a.int_usuarioid = b.int_usuarioid)
				  INNER JOIN tbl_turma c ON (b.int_turmaid = c.int_turmaid) ". $complementoSql;
				  
				$resultadoSemCentroide = $objConexao->sql($sqlSemCentroide);
				
				//Conta a quantidade de alunos (Loop)
				$qtdeTotalAlunos = mysql_num_rows($resultadoSemCentroide);
				
				//Contador para limitar a forma��o dos grupos
				$contGrupoAluno = 1;
				
				//Atribui a quantidade de alunos ao contador para verificar se o m�ximo de alunos foram atribuidos a grupos
				$contaAlunosFora = $qtdeTotalAlunos;
				
				echo "<br>";
				
				$complementoSqlIn = $complementoSqlIn . "WHERE a.int_usuarioid IN( ";
				
				//Faz a varredura at� n�o existir nenhum aluno
    			while($contaAlunosFora != 0) {
				
					for($i = 0; $i < $qtdeTotalAlunos; $i++) {
						$bolEntrouGrupo = 0;
						$perfil[$i] =  mysql_result($resultadoSemCentroide,$i,str_perfil);
						$nome[$i] =  mysql_result($resultadoSemCentroide,$i,str_nome);
						$usuarioid[$i] =  mysql_result($resultadoSemCentroide,$i,int_usuarioid);
						//echo "<br>Centroide: ". $centroide[$contGrupoAluno]."<br>";	
						//echo "<br>contGrupoAluno: ". $contGrupoAluno."<br>";
						
								if(($centroide[$contGrupoAluno] == "L�der") and ($bolEntrouGrupo == 0)) { 
									if(($perfil[$i] == "Fleum�tico") or ($perfil[$i] == "Melanc�lico") or ($perfil[$i] == "Ativo") or ($perfil[$i] == "Ap�tico")) {
										echo "Grupo".$contGrupoAluno."-> ";
										echo $nome[$i]." (".$perfil[$i].") | | | ";
										$contGrupoAluno++;
										$bolEntrouGrupo = 1;
										$contaAlunosFora--;	
										
										if($contGrupoAluno == $qtdeGrupos) {	
											$complementoSql = $complementoSql . $usuarioid[$i]." ) ";
										} else { 
											$complementoSql = $complementoSql . $usuarioid[$i]." , ";
										}
														
									} 
								} 
								if(($centroide[$contGrupoAluno] == "Social") and ($bolEntrouGrupo == 0)) { 
									if(($perfil[$i] == "Amorfo") or ($perfil[$i] == "Ativo") or ($perfil[$i] == "Fleum�tico")) { 
										echo "Grupo".$contGrupoAluno."-> ";
										echo $nome[$i]." (".$perfil[$i].") | | | ";		
										$contGrupoAluno++;		
										$bolEntrouGrupo = 1;
										$contaAlunosFora--;	
									} 
								}  
								if(($centroide[$contGrupoAluno] == "Ativo") and ($bolEntrouGrupo == 0)){ 
									if(($perfil[$i] == "Inst�vel") or ($perfil[$i] == "Social") or ($perfil[$i] == "L�der")) { 		
										echo "Grupo".$contGrupoAluno."-> ";
										echo $nome[$i]." (".$perfil[$i].") | | | ";
										$contGrupoAluno++;
										$bolEntrouGrupo = 1;
										$contaAlunosFora--;	
									}			
								} else if($bolEntrouGrupo == 0) {
									//echo "*Sem grupo: ". $nome[$i]."*";
										$complementoSqlIn = $complementoSqlIn . $usuarioid[$i]." , ";
									 
								}
							
							//Reinicia a contagem dos grupos de alunos
							if($contGrupoAluno > $qtdeGrupos) {
									$contGrupoAluno = 1;
							}
						
						}	
						//Nova linha para o grupo
						echo "<br>";
						
						
						//Redefine a busca sem os usu�rios j� inseridos nos grupos
						echo $sqlSemCentroide2 = 
						"SELECT 
						  b.str_nome,
						  b.str_email,
						  a.str_perfil,
						  a.int_usuarioid
						FROM
						  tbl_teste a
						  INNER JOIN tbl_usuario b ON (a.int_usuarioid = b.int_usuarioid)
						  INNER JOIN tbl_turma c ON (b.int_turmaid = c.int_turmaid) ". $complementoSqlIn;
									
						
				}
				
				/** Fim do da Agrega��o dos grupos **/	
					
		}
}
?>