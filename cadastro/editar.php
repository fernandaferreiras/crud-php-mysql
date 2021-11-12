<?php
session_start();

if (isset($_SESSION['idSessao'])) {

    include('../componentes/header.php');
    require('../database/conexao.php');

    $cod_pessoa = $_GET['cod_pessoa'];
    $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa=$cod_pessoa";
    $resultado = mysqli_query($conexao, $sql);
    $pessoa = mysqli_fetch_array($resultado);
?>


    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Edição</h2>
            </div>
            <div class="card-body">
                <form method="post" action="acoes.php">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="cod_pessoa" value="<?= $cod_pessoa ?>">
                    <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome" value="<?= $pessoa['nome'] ?>" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome" value="<?= $pessoa['sobrenome'] ?>" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email" value="<?= $pessoa['email'] ?>" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular" value="<?= $pessoa['celular'] ?>" required>
                    <br />
                    <button class="btn btn-success">EDITAR</button>
                </form>
            </div>
        </div>
    </div>


<?php
} else {
    header('location: ../login/index.php');
    echo ('USUÁRIO NÃO AUTENTICADO');
}

include('../componentes/footer.php');
?>