<?php

include("alunomatriculado.php");

if(isset($_POST['idalunomatriculado']))
{
    $deletar = $_POST['idalunomatriculado'];
    
    if ($delete != 'admin')
    {
        ExcluirMatricula($deletar);
    }
    else header("Location:form_matricula.php?del=admin");

    header("Location:form_matricula.php?del=ok");
}
else
{
    die("falhou");
}

?>