<?php

require_once("header.php");
require_once("avaliacaoaluno.php");
require_once("valida_formulario.php");

if (isset($_POST['idavaliacao']) && isset($_POST['idaluno']) && isset($_POST['nota'])) {
    $valor1 = ($_POST['idavaliacaoaluno']);
    $valor2 = ($_POST['idavaliacao']);
    $valor3 = ($_POST['idaluno']);
    $valor4 = trim($_POST['nota']);
    if (verificarAva($valor1, $valor3)) {
        die("Erro.");
    } else {
        $valor2 = ($_POST['idavaliacao']);
        $valor3 = ($_POST['idaluno']);
        $valor4 = ($_POST['nota']);
        cadastrarAva($valor1, $valor2, $valor3, $valor4);
        header('Location: form_nota.php');
    }
}


?>