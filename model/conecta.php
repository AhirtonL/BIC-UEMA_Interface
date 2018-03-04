<?
  // Desc  : Objeto para se conectar com o banco de dados mysql
  class ConexaoMysql
  {
	  ////////////////Atributos da class//////////////////
	  
	  var $servidor="localhost";
	  var $usuario="root";
	  var $senha="alemanha.com.br";
	  var $banco="db_bicuema";
	  
	  var $query="";
	  var $link="";
	  
	  
	  ////////////////Metodos da classe///////////////
	  // Metodo Contrutor
	  function ConexaoMysql()
	  {
	  	$this->conexao();
	  }
	  
	  // Metodo conexao com o banco
	  function conexao()
	  {
		  $this->link = mysql_connect($this->servidor,$this->usuario,$this->senha);
		  if (!$this->link) {
			  die("Error na conexao");
		  } elseif (!mysql_select_db($this->banco,$this->link)) {
		  	die("Error na conexao");
	 	  }
	  }
	  
	  // Metodo sql
	  function sql($query)
	  {
		  $this->query = $query;
		  	if ($result = mysql_query($this->query,$this->link)) {
		  	return $result;
		  } else {
		  	return 0;
		  }
	  }
	  
	  // Metodo que retorna o ultimo id de um inserчуo
	  function id()
	  {
	  	return mysql_insert_id($this->link);
	  }
	  
	  // Metodo fechar conexao
	  function fechar()
	  {
	  	return mysql_close($this->link);
	  }
  }
  /////////////////FIM DA CLASSE////////////////
  ?>