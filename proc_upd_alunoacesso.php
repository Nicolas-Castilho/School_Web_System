<?php

require_once("login.php");

if (isset($_POST['idaluno']))
{
    $aluno = ($_POST['idaluno']);
    $dslogin = $_POST['dslogin'];

    if ($aluno != 'admin')
    {
        AtualizarAluno($aluno,$dslogin);
        header("Location: form_update_acesso.php?alunoacesso=ok");
    }
    else
        echo "As senhas não conferem.";


}

?>