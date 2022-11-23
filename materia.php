<?php
require_once("mysql.php");

$sqlSelect = "select * from materia where lower(dsmateria) like '%";
$novaMateria = "insert into materia(dsmateria) values ('@')";

function selecionaMateria($nome)
{
    global $sqlSelect;

    $sql = $sqlSelect . strtolower($nome) . "%'";

    return selectRegistros($sql);
}

function listaMaterias()
{
    return selectRegistros("select * from materia");
}

function existeMateria($nome)
{
    //$sql = "select * from materia where lower(dsmateria)='" . strtolower(utf8_encode($nome)) . "'";

    //die($sql);

    $retorno = selectRegistros("select * from materia where lower(dsmateria)='" . strtolower($nome) . "'");

    if (count($retorno) > 0) return true;
    else return false;
}
function cadastrarMateria($nome)
{
    //die($nome);
    global $novaMateria;

    $sql = str_replace("@",$nome,$novaMateria);

    return insereRegistro($sql);
}

function getName($id)
{
    $retorno = selectRegistros("select * from materia where idmateria='" . $id . "'");

    return $retorno[0]['dsmateria'];
}

function setName($id, $nome)
{
    $sql = "UPDATE MATERIA SET DSmateria='" . $nome . "' WHERE idmateria=" . $id;

    return updateRegistro($sql);
}
//var_dump(listaMateria("teste"));
//var_dump(listaMaterias());
function delID($id)
{
    $sql = "DELETE FROM MATERIA  WHERE idmateria=" . $id;   

    return deleteRegistro($sql);
}

?>