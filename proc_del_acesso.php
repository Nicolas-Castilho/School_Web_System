<?php 
    require_once("header.php");
    require_once("login.php");
    require_once("valida_formulario.php");

    if (isset($_POST['idacessoDEL']))
    {
        if (caracteresInvalidos($_POST['idacessoDEL']))
        {
            die("Caracteres inválidos detectados!");
        }
        else
        {
            $id = trim($_POST['idacessoDEL']);
            if (excluirAcesso($id))
            {
                if ($id != trim('admin'))
                {
                    delID($id);
                    header("Location: form_acesso.php?del=1");
                }
                else
                {
                    header("Location: form_acesso.php?del=2");
                }
            }
            else
            {
                header("Location: form_acesso.php?del=0");
            }


            
            
        }
    }
?>


