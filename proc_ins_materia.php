<?php

require_once("header.php");
require_once("materia.php");
require_once("valida_formulario.php");

if (!caracteresInvalidos($_POST['cadMateria']) && trim($_POST['cadMateria']) != "") {
    $valor = trim($_POST['cadMateria']);
    if (existeMateria($valor)) {
        die("Já existe esta matéria na grade.");
    } else {
        $valor = trim($_POST['cadMateria']);
        cadastrarMateria($valor);
        header('Location: form_materia.php');
    }
}


?>