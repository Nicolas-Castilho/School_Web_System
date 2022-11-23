<?php
    require_once("mysql.php");
    require_once("valida_formulario.php");

    function cadastrarAvaliacao($idavaliacao, $dsavaliacao,$idmateria)
    {
        $sql = "insert into avaliacao(idavaliacao,dsavaliacao,idmateria) values
         ('$idavaliacao','$dsavaliacao','$idmateria')";

        $sql = str_replace("@id",$idavaliacao,$sql);
        $sql = str_replace("@avaliacao",$dsavaliacao,$sql);
        $sql = str_replace("@materia",$idmateria,$sql);

        //var_dump($sql);
        insereRegistro($sql);
    }

    function verificarAvaliacao($idavaliacao, $idmateria)
    {
        $sqlValida = "Select * from avaliacao where idavaliacao='@id' and idmateria='@materia'";
        $sql = str_replace("@id",$idavaliacao,$sqlValida);
        $sql = str_replace("@materia",$idmateria,$sql);

        //die($dssenha);
        $teste = selectRegistros($sql);

        if(count($teste) > 0) return true;
        else return false;
    }

    function ListarMaterias()
    {
        $sql = "select * from materia";
                
        return selectRegistros($sql);
    }

    function ListarTodasAvaliacoes()
    {
        $sql = "select  i.idavaliacao," .
        " i.idmateria," .
        " i.dsavaliacao," .
        " m.dsmateria" .
        " from avaliacao i," .
        " materia m" .
        " where i.idmateria = m.idmateria";


        return selectRegistros($sql);
    }

    function ExcluirAvaliacao($valor)
    {
        $sql = "delete from avaliacao where idavaliacao = '$valor'";

        return deleteRegistro($sql);
    }

?>