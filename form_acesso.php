<?php require_once("header.php");
require_once("menu.php");
require_once("login.php");


//var_dump($alunos);
?>

<div class="content">
    <h2>Manutenção de Acessos </h2>
    <hr />

    <form action="proc_ins_acesso.php" method="POST">
        <label>Usuário: <input type="text" name=dslogin> </label>
        <label>Senha: <input type="password" name=dssenha> </label>
        <select name="idaluno">
            <option selected></option>

            <?php
            $alunos = ListarAlunosValidos();

            foreach ($alunos as $aluno) {
                echo '<option value="' . $aluno['idaluno'] . '">' . $aluno['nmaluno'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="cadastrar">
    </form>

    <hr />

    <table style="border: 1px; border-color:black;">
        <thead>
            <th>Usuário</th>
            <th>Senha</th>
            <th>Aluno</th>
            <th>Atualizar </th>
            <th> Excluir </th>
        </thead>
        <tbody>
            
            <?php
            $listagem = ListarTodosLogin();
            foreach ($listagem as $login) {
                echo "<tr>" .
                    "<td>" . $login['dslogin'] . "</td>" .
                    "<td>" . $login['dssenha'] . "</td>" .
                    "<td>" . $login['nmaluno'] . "</td>" .
                    "<td>" .
                    '<form action="form_update_acesso.php" method="POST">' .
                    '<input type="hidden" value="' . $login['dslogin'] .  '" name="dslogin" />' .
                    '<input type="submit" value="Atualizar">' .
                    "</form>" .
                    "</td>" .
                    "<td>" .
                    '<form action="proc_delete_acesso.php" method="POST">' .
                    '<input type="hidden" value="' . $login['dslogin'] .  '" name="dslogin" />' .
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