<?php 
    require_once("header.php");
    require_once("materia.php");
    require_once("valida_formulario.php");

    if (isset($_POST['idmateriaDEL']))
    {
        $id = ($_POST['idmateriaDEL']);
            delID($id);
            header("Location: form_materia.php?del=1");          
    }
    else
    {
        header("Location: form_materia.php?del=0");
    }  
?>


