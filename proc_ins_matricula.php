<?php

require_once("header.php");
require_once("alunomatriculado.php");
require_once("valida_formulario.php");

if (isset($_POST['idaluno']) && isset($_POST['idmateria'])) {
    $valor1 = ($_POST['idalunomatriculado']);
    $valor2 = ($_POST['idaluno']);
    $valor3 = ($_POST['idmateria']);
    if (verificarMatricula($valor2, $valor3)) {
        die("Este usuário já está matriculado na matéria.");
    } else {
        $valor2 = ($_POST['idaluno']);
        $valor3 = ($_POST['idmateria']);
        cadastrarMatricula($valor1, $valor2, $valor3);
        header('Location: form_matricula.php');
    }
}


?>