<?php require_once("header.php");
require_once("menu.php");
require_once("alunomatriculado.php");


//var_dump($alunos);
?>

<div class="content">
    <h2>Manutenção de Matrículas </h2>
    <hr />

    <form action="proc_ins_matricula.php" method="POST">
        <select name="idaluno">
            <option selected></option>

            <?php
            $alunos = ListarAlunos();

            foreach ($alunos as $aluno) {
                echo '<option value="' . $aluno['idaluno'] . '">' . $aluno['nmaluno'] . "</option>";
            }
            ?>
        </select>
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
            <th>Aluno</th>
            <th>Matéria</th>
            <th> Excluir </th>
        </thead>
        <tbody>
            
            <?php
            $listagem = ListarTodasMatriculas();
            foreach ($listagem as $matricula) {
                echo "<tr>" .
                    "<td>" . $matricula['nmaluno'] . "</td>" .
                    "<td>" . $matricula['dsmateria'] . "</td>" .
                    "<td>" .
                    '<form action="proc_delete_matricula.php" method="POST">' .
                    '<input type="hidden" value="' . $matricula['idalunomatriculado'] .  '" name="idalunomatriculado" />' .
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