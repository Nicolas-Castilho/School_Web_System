<?php

include("avaliacao.php");

if(isset($_POST['idavaliacao']))
{
    $deletar = $_POST['idavaliacao'];
    
    if ($delete != 'admin')
    {
        ExcluirAvaliacao($deletar);
    }
    else header("Location:form_cad_teste.php?del=admin");

    header("Location:form_cad_teste.php?del=ok");
}
else
{
    die("falhou");
}

?>