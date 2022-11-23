<?php

require_once("avaliacaoaluno.php");

if (isset($_POST['nota']))
{
    $nota = ($_POST['nota']);
    $avaliacaoaluno = $_POST['idavaliacaoaluno'];

    if ($nota != 'admin')
    {
        atualizarNota($nota,$avaliacaoaluno);
        header("Location: form_update_avaliacao.php?alunoacesso=ok");
    }
    else
        echo "Erro";


}

?>