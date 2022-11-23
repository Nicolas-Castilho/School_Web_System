<?php 
    require_once("header.php");
    require_once("login.php");
    require_once("valida_formulario.php");

    if (isset($_POST['idacessoUPD']))
    {
        if (caracteresInvalidos($_POST['idacessoUPD']))
        {
            die("Caracteres inválidos detectados!");
        }
        else
        {
            $id = trim($_POST['idacessoUPD']);
            $senha = trim($_POST['dssenha']);
            setUser($id, $senha);
            header("Location: form_acesso.php?upd=1");
        }
    }
?>
