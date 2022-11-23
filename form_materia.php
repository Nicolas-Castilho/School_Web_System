<?php require("header.php") ?>

<body>

    <?php 
    require("menu.php");
    require_once("materia.php");

?>


    <div class="content">
        <h2>Manutenção de Matérias</h2>
        <hr />
            <form action="proc_ins_materia.php" method="POST">
                <label>Matéria a Cadastrar: <input type="text" name="cadMateria" size="30" maxsize="30" /></label>
                <input type="submit" value="Cadastrar" />
            </form>
        <hr />
        <?php
            $materias = listaMaterias();

            //var_dump($materias);
            //die("pausa");
        echo "<table>" .
            "<thead>" .
            "<tr>" .
            "<th>Identificação</th>" .
            "<th>Nome:</th>" .
            "<th>Exclusão:</th>" .
            "</tr>" .
            "</thead>" .
            "<tbody> ";

        foreach ($materias as $registro) {
            echo'    <tr>' .
                '        <td><a href=form_materia.php?alterarid=' . $registro['idmateria'] . '>' . $registro['idmateria'] . '</a></td>' .
                '        <td>' . $registro['dsmateria'] . '</td>' .
                ' <td>' .
                '<form action="proc_del_materia.php" method="POST">' .
                '    <input type="hidden" name="idmateriaDEL" value="' . $registro['idmateria'] . '" />' .
                '    <input type="submit" value="Excluir" />' .
                '</form>' .
                '    </tr>';
        }
        ?>
        
        <tfoot>
            <tr>
                <td colspan="3">
                <?php 
                    if(isset($_GET['upd'])) echo "Registro alterado"; 
                    if(isset($_GET['del']))
                    {
                        switch ($_GET['del'])
                        {
                            case "0":
                                echo "o registro não pode ser excluído";
                                break;
                            case "1":
                                echo "registro excluído";
                                break;
                            default:
                                echo "comando inválido";
                        }
                    }
                
                ?></td>
            </tr>
        </tfoot>
        </table>
        <hr />
        <?php
            if (isset($_GET['alterarid']))
            {
                echo '<form action="proc_upd_materia.php" method="POST">';
                echo '    <input type="text" name="dsmateria" value=" '. getName($_GET['alterarid']) .' " />';
                echo '    <input type="hidden" name="idmateriaUPD" value="' . $_GET['alterarid'] . '" />';
                echo '    <input type="submit" value="alterar" />';
                echo '</form>';
            }
        ?>
    </div>


</body>

</html>