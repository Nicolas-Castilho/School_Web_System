<?php require_once("header.php");
require_once("menu.php");
require_once("avaliacaoaluno.php");


//var_dump($alunos);
?>

<div class="content">
    <h2>Manutenção de Notas </h2>
    <hr />

    <a href="form_cad_teste.php">Cadastrar Avaliação</a>
    <hr></hr>

    <form action="proc_ins_avaliacaoaluno.php" method="POST">
    <select name="idavaliacao">
            <option selected></option>

            <?php
            $avaliacoes = listarTestes();

            foreach ($avaliacoes as $avaliacao) {
                echo '<option value="' . $avaliacao['idavaliacao'] . '">' . $avaliacao['dsavaliacao'] . "</option>";
            }
            ?>
        </select>
        <select name="idaluno">
            <option selected></option>

            <?php
            $alunos = listarEstudante();

            foreach ($alunos as $aluno) {
                echo '<option value="' . $aluno['idaluno'] . '">' . $aluno['nmaluno'] . "</option>";
            }
            ?>
        </select>
        <label>Nota: <input type="text" name="nota" size="5" maxsize="5" /></label>
        <input type="submit" value="cadastrar">
    </form>
    

    <hr />

    <table style="border: 1px; border-color:black;">
        <thead>
            <th>Avaliação</th>
            <th>Aluno</th>
            <th>Nota</th>
            <th>Atualizar </th>
            <th> Excluir </th>
        </thead>
        <tbody>
            
            <?php
            $listagem = ListarTodasAvas();
            foreach ($listagem as $avaliacao) {
                echo "<tr>" .
                    "<td>" . $avaliacao['dsavaliacao'] . "</td>" .
                    "<td>" . $avaliacao['nmaluno'] . "</td>" .
                    "<td>" . $avaliacao['nota'] . "</td>" .
                    "<td>" .
                    '<form action="form_update_avaliacao.php" method="POST">' .
                    '<input type="hidden" value="' . $avaliacao['idavaliacaoaluno'] .  '" name="idavaliacaoaluno" />' .
                    '<input type="submit" value="Atualizar">' .
                    "</form>" .
                    "</td>" .
                    "<td>" .
                    '<form action="proc_del_avaliacaoaluno.php" method="POST">' .
                    '<input type="hidden" value="' . $avaliacao['idavaliacaoaluno'] .  '" name="idavaliacaoaluno" />' .
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