<?
class funcoesNF { 
	
	function antiSqlInjection($string)
	{
		$string = get_magic_quotes_gpc() ? stripslashes($string) : $string;
	
		$string = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($string) : mysql_escape_string($string);
		
		return $string;
	}
	
}	
	
?>