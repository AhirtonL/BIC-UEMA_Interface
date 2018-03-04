<?
include ("model/conecta.php");
include ("model/classUsuario.php");
include ("model/classTesteRV.php");
include ("model/classAlgoritmo.php");
include ("includes/classFuncoesNF.php");

class Controle { 

	  function inserirUsuarioTestCtrl(){
		 	
			$objUsuario = new Usuario();
			$objTeste = new TesteRogerVerdier();
			$situacaoCpf = $objUsuario->validaCpf($_SESSION[cpf]);
			$usuarioExiste = $objUsuario->validaUsuario($_SESSION[cpf]);
			
			//Valida se o usuário já foi inserido anteriormente
			if($usuarioExiste != 1) { 
				//Valida se o cpf 
				if($situacaoCpf){ 
					
					$retorno = $objUsuario->inserirUsuarioMdl();
					$_SESSION[usuarioId] = $retorno[0];
					$retorno1 = $objTeste->inserirTesteMdl();
					$_SESSION[testeId] = $retorno1[0];
					$retorno2 = $objTeste->gerarResultadoTesteMdl();
					$objTeste->gravarPerfil($retorno2[19]);
					
				} else { 
					
					echo $retorno2 = "Atenção! CPF inválido.";
					echo "<script language='javascript'>"; 
						echo "window.location = 'index.php?msg=$retorno2'";
					echo "</script>";
				}
				
			} else { 
					
					echo $retorno2 = "Atenção! Este usuário já fez o Teste anteriormente!";
					echo "<script language='javascript'>"; 
						echo "window.location = 'index.php?msg=$retorno2'";
					echo "</script>";
			}		
			
			return $retorno2;
	  }
	  
	  
	  function retornarUsuarioTeste() {
		 	
			$objTeste = new TesteRogerVerdier();
			
			$_SESSION[usuarioId] = 8;
			
			$retorno = $objTeste->gerarResultadoTesteMdl();
			
			return $retorno;
	  }
	  
	  function iniciarFormacao(){
		 	
			$objAlgoritmo = new Algoritmo();
					
			$objAlgoritmo->formarGrupos();
	  }
	   
}  
?>