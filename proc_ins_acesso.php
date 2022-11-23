<?php

require_once("header.php");
require_once("login.php");
require_once("valida_formulario.php");

if (!caracteresInvalidos($_POST['dslogin']) && trim($_POST['dslogin']) != "") {
    $valor1 = trim($_POST['dslogin']);
    $valor2 = trim($_POST['dssenha']);
    $valor3 = trim($_POST['idaluno']);
    if (verificarLogin($valor1, $valor2)) {
        die("Já existe um usuário com esse acesso.");
    } else {
        $valor1 = trim($_POST['dslogin']);
        $valor2 = trim($_POST['dssenha']);
        cadastrarLogin($valor1, $valor2, $valor3);
        header('Location: form_acesso.php');
    }
}


?>