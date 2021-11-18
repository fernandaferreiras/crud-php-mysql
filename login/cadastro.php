<?php
session_start();

if (isset($_SESSION['idSessao'])) {
    header('location: ../');
} else {

    include('../componentes/header.php');
    require('../database/conexao.php');
?>


    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Cadastro</h2>
            </div>
            <div class="card-body">
                <form method="post" action="processaLogin.php">
                    <input type="hidden" name="acao" value="sign up">
                    <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o usuário" name="usuario" id="usuario" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular" required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite a senha" name="senha" id="senha" required>
                    <br />
                    <button class="btn btn-success">CADASTRAR</button>
                </form>
            </div>
        </div>
    </div>


<?php
}

include('../componentes/footer.php');
?>