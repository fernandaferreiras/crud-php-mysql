<?php
session_start();
if (isset($_SESSION['idSessao'])) {

    include('../componentes/header.php');
?>

    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Cadastro</h2>
            </div>
            <div class="card-body">
                <form method="post" action="./acoes.php">
                    <input name="acao" type="hidden" value="inserir">
                    <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular">
                    <br />
                    <button class="btn btn-success">CADASTRAR</button>
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