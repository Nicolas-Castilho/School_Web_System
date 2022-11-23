<?php

require_once("avaliacaoaluno.php");

if (isset($_POST['idavaliacao']))
{
    $avaliacao = ($_POST['idavaliacao']);
    $avaliacaoaluno = $_POST['idavaliacaoaluno'];

    if ($avaliacao != 'admin')
    {
        atualizarTeste($avaliacao,$avaliacaoaluno);
        header("Location: form_update_avaliacao.php?alunoacesso=ok");
    }
    else
        echo "Erro";


}

?>