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

//Contador para limitar a formacao dos grupos
$contGrupoAluno = 1;

    /** 2. Agrupar os centroides em um grupo de acordo com o n�mero total de grupos **/

    //Retire os centroides no proximo sql
    $complementoSql = $complementoSql . "WHERE a.int_usuarioid NOT IN( ";

    //Varrer os alunos e recuperar os centroide1 (l�deres)
    for($i = 0; $i < $qtdeTotalAlunos; $i++) {

            $perfil[$i] =  mysql_result($resultado,$i,str_perfil);
            $nome[$i] =  mysql_result($resultado,$i,str_nome);
            $usuarioid[$i] =  mysql_result($resultado,$i,int_usuarioid);

            if(($perfil[$i] == "Líder") and ($contGrupoAluno <= $qtdeGrupos)) {
                //formar 1 grupo para cada lider
                echo "Grupo".$contGrupoAluno;
                echo "<br>";
                echo $centroide[$contGrupoAluno] = $perfil[$i];
                echo " - ";
                echo $nome[$i];
                echo "<br>";

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

            if(($perfil[$i] == "Social") and ($contGrupoAluno <= $qtdeGrupos)) {
                //formar 1 grupo para cada social
                echo "Grupo".$contGrupoAluno;
                echo "<br>";
                echo $centroide[$contGrupoAluno] = $perfil[$i];
                echo " - ";
                echo $nome[$i];
                echo "<br>";

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

            if(($perfil[$i] == "Ativo") and ($contGrupoAluno <= $qtdeGrupos)) {
                //formar 1 grupo para cada ativo
                echo "Grupo".$contGrupoAluno;
                echo "<br>";
                echo $centroide[$contGrupoAluno] = $perfil[$i];
                echo " - ";
                echo $nome[$i];
                echo "<br>";

                if($contGrupoAluno == $qtdeGrupos) {
                        $complementoSql = $complementoSql . $usuarioid[$i]." ) ";
                } else {
                        $complementoSql = $complementoSql . $usuarioid[$i]." , ";
                }

                $contGrupoAluno++;
            }
    }



    /** 3. Agregacao dos grupos **/

    $sqlSemCentroide =
    "SELECT
      b.str_nome,
      b.str_email,
      a.str_perfil
    FROM
      tbl_teste a
      INNER JOIN tbl_usuario b ON (a.int_usuarioid = b.int_usuarioid)
      INNER JOIN tbl_turma c ON (b.int_turmaid = c.int_turmaid) ". $complementoSql;

    $resultadoSemCentroide = $objConexao->sql($sqlSemCentroide);

    //Conta a quantidade de alunos (Loop)
    $qtdeTotalAlunos = @mysql_num_rows($resultadoSemCentroide);

    //Contador para limitar a formacao dos grupos
    $contGrupoAluno = 1;

    //Varrer os alunos e distribuir nos grupos
    for($i = 0; $i < $qtdeTotalAlunos; $i++) {
            $bolEntrouGrupo = 0;
            $perfilMembros[$i] =  mysql_result($resultadoSemCentroide,$i,str_perfil);
            $nome[$i] =  mysql_result($resultadoSemCentroide,$i,str_nome);

            if(($perfilMembros[$i] == "Fleumático") or ($perfilMembros[$i] == "Melancólico") or ($perfilMembros[$i] == "Ativo")) {
                if(($centroide[$contGrupoAluno] == "Lider") and ($bolEntrouGrupo == 0)) {

                        echo "<br>"."Grupo".$contGrupoAluno."<br>";
                        echo $perfilMembros[$i];
                        echo " - ";
                        echo $nome[$i];
                        echo "<br>";
                        $contGrupoAluno++;
                        $bolEntrouGrupo = 1;

                }

            }

            if(($perfilMembros[$i] == "Amorfo") or ($perfilMembros[$i] == "Ativo") or ($perfilMembros[$i] == "Fleumático")) {
                if(($centroide[$contGrupoAluno] == "Social")  and ($bolEntrouGrupo == 0)) {

                        echo "<br>"."Grupo".$contGrupoAluno."<br>";
                        echo $perfilMembros[$i];
                        echo " - ";
                        echo $nome[$i];
                        echo "<br>";
                        $contGrupoAluno++;
                        $bolEntrouGrupo = 1;

                }

            }

            if(($perfilMembros[$i] == "Instável") or ($perfilMembros[$i] == "Social") or ($perfilMembros[$i] == "Líder")) {

                if(($centroide[$contGrupoAluno] == "Ativo") and ($bolEntrouGrupo == 0)) {

                        echo "<br>"."Grupo".$contGrupoAluno."<br>";
                        echo $perfilMembros[$i];
                        echo " - ";
                        echo $nome[$i];
                        echo "<br>";
                        $contGrupoAluno++;
                        $bolEntrouGrupo = 1;
                }

            }

            //Reinicia a contagem dos grupos de alunos
            if($contGrupoAluno > $qtdeGrupos) {
                    $contGrupoAluno = 1;
            }

    }

    /** Fim do da Agrega��o dos grupos **/

}				
			  
}			  
?>