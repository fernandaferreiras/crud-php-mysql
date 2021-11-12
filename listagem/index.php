<?php
session_start();

if (isset($_SESSION['idSessao'])) {

    include('../componentes/header.php');
?>

    <?php

    require('../database/conexao.php');

    $sql = "SELECT * FROM tbl_pessoa";

    $resultado = mysqli_query($conexao, $sql);
    ?>

    <div class="container">

        <br />

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php
                while ($pessoa = mysqli_fetch_array($resultado)) :

                    $cod_pessoa = $pessoa['cod_pessoa'];
                ?>
                    <tr>
                        <th><?= $pessoa['cod_pessoa'] ?></th>
                        <th><?= $pessoa['nome'] ?></th>
                        <th><?= $pessoa['sobrenome'] ?></th>
                        <th><?= $pessoa['email'] ?></th>
                        <th><?= $pessoa['celular'] ?></th>
                        <th>
                            <button onclick='javascript:window.location.href = "../cadastro/editar.php?cod_pessoa=<?= $cod_pessoa ?>" ' class="btn btn-warning">Editar</button>

                            <form action="../cadastro/acoes.php" method="POST" style="display: inline;">
                                <input type="hidden" name="cod_pessoa" value="<?= $cod_pessoa ?>">
                                <input type="hidden" name="acao" value="deletar">
                                <button class="btn btn-danger">Excluir</button>
                            </form>

                        </th>
                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>

        </table>

    </div>

<?php
} else {
    header('location: ../login/index.php');
    echo ('USUÁRIO NÃO AUTENTICADO');
}
include('../componentes/footer.php');
?>