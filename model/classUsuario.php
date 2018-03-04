<?

class Usuario { 
	
	//Verifica se o usuário já existe
	public function validaUsuario($cpf) {
			
			$sql = 
				"SELECT 
				  count(a.int_usuarioid) as total
				FROM
				  tbl_usuario a
				WHERE
				  a.str_cpf = $_SESSION[cpf]";
			
			$objConexao = new ConexaoMysql();
			$result = $objConexao->sql($sql);
			$row = @mysql_fetch_array($result);
			
			$dadosUsuario = array();
			$dadosUsuario[0] =  $row['total'];
						
			if($dadosUsuario[0] >= 1) { 
				return true;
			} else { 
				return false;
			}
			
	}
	
	//Verifica se o CPF do usuário é válido
	function validaCPF($cpf)
	{
		$cpf = ereg_replace('[^0-9]', '', $cpf);
	
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '99999999999') {
			return false;
		}
	
		for ($t = 8; $t < 10;) {
			for ($d = 0, $p = 2, $c = $t; $c >= 0; $c--, $p++) {
				$d += $cpf[$c] * $p;
			}
	
			$d = ((10 * $d) % 11) % 10;
	
			if ($cpf[++$t] != $d) {
				return false;
			}
		}
	
		return true;
	}
	
	//Realiza a inserção do usuário no banco
	public function inserirUsuarioMdl() {
			
			$objFuncoes = new funcoesNF();
			
			$sql = 
				"INSERT INTO
					  tbl_usuario (
						  str_nome,
						  str_cpf,
						  str_email,
						  str_fone,
						  int_turmaid)
				VALUES(
					   '" . $objFuncoes->antiSqlInjection($_SESSION[nome]) . "',
					   '" . $objFuncoes->antiSqlInjection($_SESSION[cpf]) . "',
					   '" . $objFuncoes->antiSqlInjection($_SESSION[email]) . "',
					   '" . $objFuncoes->antiSqlInjection($_SESSION[fone]) . "',
					    $_SESSION[turmaid])";
	
		$objConexao = new ConexaoMysql();
		$result = $objConexao->sql($sql);
		
		$retorno = array();
		$retorno[0] = $objConexao->id();

			if (!mysql_error()) {
				$retorno[1] = "Inserção realizada com sucesso!";
			}else{
				$retorno[1] = "Erro na inserção do usuário!";
			}
		$objConexao->fechar();
		
		return $retorno;
	}	

}

?>		  