<?php
    require_once("mysql.php");
    require_once("valida_formulario.php");

    function cadastrarAva($idavaliacaoaluno, $idavaliacao, $idaluno,$nota)
    {
        $sql = "insert into avaliacaoaluno(idavaliacaoaluno,idavaliacao,idaluno,nota) values
         ('$idavaliacaoaluno','$idavaliacao','$idaluno','$nota')";

        $sql = str_replace("@id",$idavaliacaoaluno,$sql);
        $sql = str_replace("@avaliacao",$idavaliacao,$sql);
        $sql = str_replace("@aluno",$idaluno,$sql);
        $sql = str_replace("@nota",$nota,$sql);

        //var_dump($sql);
        insereRegistro($sql);
    }

    function verificarAva($idavaliacaoaluno, $idaluno)
    {
        $sqlValida = "Select * from avaliacaoaluno where idavaliacaoaluno='@id' and idaluno='@aluno'";
        $sql = str_replace("@id",$idavaliacaoaluno,$sqlValida);
        $sql = str_replace("@aluno",$idaluno,$sql);

        //die($dssenha);
        $prova = selectRegistros($sql);

        if(count($prova) > 0) return true;
        else return false;
    }

    function listarEstudante()
    {
        $sql = "select * from aluno";

        return selectRegistros($sql);
    }

    function listarTestes()
    {
        $sql = "select * from avaliacao";

        return selectRegistros($sql);
    }

    function listarAvas()
    {
        $sql = "select * from avaliacaoaluno";

        return selectRegistros($sql);
    }

    function ListarTodasAvas()
    {
        $sql = "select i.idavaliacaoaluno," .
        " i.idavaliacao," .
        " i.idaluno," .
        " a.nmaluno," .
        " l.dsavaliacao," .
        " i.nota" .
        " from avaliacaoaluno i," .
        " avaliacao l," .
        " aluno a" .
        " where (i.idaluno, i.idavaliacao) = (a.idaluno,l.idavaliacao)";


        return selectRegistros($sql);
    }

    function ExcluirAva($valor)
    {
        $sql = "delete from avaliacaoaluno where idavaliacaoaluno = '$valor'";

        return deleteRegistro($sql);
    }

    function atualizarTeste($avaliacao, $teste)
    {
        $sql = 'update avaliacaoaluno ' .
               " set idavaliacao = '$avaliacao'" . 
               " where idavaliacaoaluno = '$teste'";

        return updateRegistro($sql);
    }

    function atualizarAlunoT($aluno, $teste)
    {
        $sql = 'update avaliacaoaluno ' .
               " set idaluno = '$aluno'" . 
               " where idavaliacaoaluno = '$teste'";

        return updateRegistro($sql);
    }
    
    function atualizarNota($nota, $teste)
    {
        $sql = 'update avaliacaoaluno ' .
               " set nota = '$nota'" . 
               " where idavaliacaoaluno = '$teste'";

        return updateRegistro($sql);
    }
?>