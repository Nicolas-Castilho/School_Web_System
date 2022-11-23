<?php

require_once("avaliacaoaluno.php");

if (isset($_POST['idaluno']))
{
    $aluno = ($_POST['idaluno']);
    $avaliacaoaluno = $_POST['idavaliacaoaluno'];

    if ($aluno != 'admin')
    {
        atualizarAlunoT($aluno,$avaliacaoaluno);
        header("Location: form_update_avaliacao.php?alunoacesso=ok");
    }
    else
        echo "Erro";


}

?>