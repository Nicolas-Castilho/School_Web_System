<?php
    require_once("mysql.php");
    require_once("valida_formulario.php");

    function cadastrarMatricula($idalunomatriculado, $idaluno, $idmateria)
    {
        $sql = "insert into alunomatriculado(idalunomatriculado,idaluno,idmateria) values
         ('$idalunomatriculado','$idaluno','$idmateria')";

        $sql = str_replace("@matricula",$idalunomatriculado,$sql);
        $sql = str_replace("@aluno",$idaluno,$sql);
        $sql = str_replace("@materia",$idmateria,$sql);

        //var_dump($sql);
        insereRegistro($sql);
    }

    function verificarMatricula($idaluno, $idmateria)
    {
        $sqlValida = "Select * from alunomatriculado where idaluno='@aluno' and idmateria='@materia'";
        $sql = str_replace("@aluno",$idaluno,$sqlValida);
        $sql = str_replace("@materia",$idmateria,$sql);

        //die($dssenha);
        $matricula = selectRegistros($sql);

        if(count($matricula) > 0) return true;
        else return false;
    }

    function listarMatriculas()
    {
        return selectRegistros("select * from alunomatriculado");
    }

    function ListarAlunos()
    {
        $sql = "select * from aluno";

        return selectRegistros($sql);
    }

    function ListarMaterias()
    {
        $sql = "select * from materia";
                
        return selectRegistros($sql);
    }

    function ListarTodasMatriculas()
    {
        $sql = "select  i.idalunomatriculado," .
		" i.idaluno,"  .
    	" i.idmateria," .
        " a.nmaluno," .
        " m.dsmateria" .
		" from alunomatriculado i," .
        " aluno a," .
        " materia m" .
		" where (i.idaluno, i.idmateria) = (a.idaluno, m.idmateria)";


        return selectRegistros($sql);
    }

    function ExcluirMatricula($valor)
    {
        $sql = "delete from alunomatriculado where idalunomatriculado = '$valor'";

        return deleteRegistro($sql);
    }

    function atualizarNome($aluno, $alunomatriculado)
    {
        $sql = 'update alunomatriculado ' .
               " set idaluno = '$aluno'" . 
               " where idalunomatriculado = '$alunomatriculado'";

        return updateRegistro($sql);
    }

    function atualizarMateria($materia, $alunomatriculado)
    {
        $sql = 'update alunomatriculado ' .
               " set idmateria = '$materia'" . 
               " where idalunomatriculado = '$alunomatriculado'";

        return updateRegistro($sql);
    }
?>