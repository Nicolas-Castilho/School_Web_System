<?php

include("avaliacaoaluno.php");

if(isset($_POST['idavaliacaoaluno']))
{
    $deletar = $_POST['idavaliacaoaluno'];
    
    if ($delete != 'admin')
    {
        ExcluirAva($deletar);
    }
    else header("Location:form_nota.php?del=admin");

    header("Location:form_nota.php?del=ok");
}
else
{
    die("falhou");
}

?>