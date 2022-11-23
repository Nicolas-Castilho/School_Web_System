<?php require_once("header.php");
require_once("menu.php");
require_once("avaliacao.php");


//var_dump($alunos);
?>

<div class="content">
    <h2>Cadastrar Avaliação</h2>
    <hr/>
    <a href="form_nota.php">Retornar a Manutenção de Notas</a>
    <hr></hr>

    <form action="proc_ins_avaliacao.php" method="POST">
    <label>Avaliação: <input type="text" name="dsavaliacao" size="30" maxsize="30" /></label>
        <select name="idmateria">
            <option selected></option>

            <?php
            $materias = ListarMaterias();

            foreach ($materias as $materia) {
                echo '<option value="' . $materia['idmateria'] . '">' . $materia['dsmateria'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="cadastrar">
    </form>
    

    <hr />

    <table style="border: 1px; border-color:black;">
        <thead>
            <th> Avaliação </th>
            <th> Matéria </th>
            <th> Excluir </th>
        </thead>
        <tbody>
            
            <?php
            $listagem = ListarTodasAvaliacoes();
            foreach ($listagem as $avaliacao) {
                echo "<tr>" .
                    "<td>" . $avaliacao['dsavaliacao'] . "</td>" .
                    "<td>" . $avaliacao['dsmateria'] . "</td>" .
                    "<td>" .
                    '<form action="proc_del_avaliacao.php" method="POST">' .
                    '<input type="hidden" value="' . $avaliacao['idavaliacao'] .  '" name="idavaliacao" />' .
                    '<input type="submit" value="Excluir">' .
                    "</form>" .
                    "</td>" .
                    "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
            </tr>
        </tfoot>
    </table>
</div>