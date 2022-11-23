<?php require("header.php") ?>

<body>
<div class="content">
    <?php 
    require_once("menu.php") ;
    require_once("avaliacaoaluno.php");
    ?>
    <hr />
    <form action="proc_upd_avaliacao.php" method="POST">
        <input type="hidden" name="idavaliacaoaluno" value="<?php echo $_POST['idavaliacaoaluno']; ?>">
        <label>Escolha qual avaliação atribuir para <?php echo $_POST['nmaluno'] ?>
        <select name="idavaliacao">
            <option selected></option>

            <?php
            $avaliacoes = listarTestes();

            foreach ($avaliacoes as $avaliacao) {
                echo '<option value="' . $avaliacao['idavaliacao'] . '">' . $avaliacao['dsavaliacao'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Alterar Avaliacao">
    </form>
    <hr />
    <form action="proc_upd_ava_aluno.php" method="POST">
        <input type="hidden" name="idavaliacaoaluno" value="<?php echo $_POST['idavaliacaoaluno'] ?>">
        <label>Escolha qual aluno atribuir para <?php echo $_POST['nmaluno'] ?>
        <select name="idaluno">
            <option selected></option>

            <?php
            $alunos = listarEstudante();

            foreach ($alunos as $aluno) {
                echo '<option value="' . $aluno['idaluno'] . '">' . $aluno['nmaluno'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Alterar Aluno">
    </form>
    <hr />
    <form action="proc_upd_ava_nota.php" method="POST">
        <input type="hidden" name="idavaliacaoaluno" value="<?php echo $_POST['idavaliacaoaluno']; ?>">
        <label>Atualize a Nota:<input type="text" name="nota" maxlength=10 /></label>
        <input type="submit" value="Alterar Nota">
    </form>
    <hr />
    <hr>
    <a href="form_nota.php">Retornar a Manutenção de Notas</a>
    </hr>

</div>