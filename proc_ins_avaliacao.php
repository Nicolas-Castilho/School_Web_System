<?php

require_once("header.php");
require_once("avaliacao.php");
require_once("valida_formulario.php");

if (isset($_POST['dsavaliacao']) && isset($_POST['idmateria'])) {
    $valor1 = ($_POST['idavaliacao']);
    $valor2 = ($_POST['dsavaliacao']);
    $valor3 = ($_POST['idmateria']);
    if (verificarAvaliacao($valor2, $valor3)) {
        die("Erro.");
    } else {
        $valor2 = ($_POST['dsavaliacao']);
        $valor3 = ($_POST['idmateria']);
        cadastrarAvaliacao($valor1, $valor2, $valor3);
        header('Location: form_cad_teste.php');
    }
}


?>