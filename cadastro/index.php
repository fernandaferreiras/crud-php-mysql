<?php

include('../componentes/header.php');

session_start();

require('../database/conexao.php');

$sql = "SELECT * FROM tbl_pessoa";

$resultado = mysqli_query($conexao, $sql);

?>


<div class="container">
    <hr>
    <div class="card">
        <div class="card-header">
            <h2>Cadastro</h2>
        </div>
        <div class="card-body">
            <form method="post" action="./funcoes.php">
                <input type="hidden" name="acao" value="inserir" />
                <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome" require>
                <br />
                <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome" require>
                <br />
                <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email" require>
                <br />
                <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular" require>
                <br />
                <input class="form-control" type="text" placeholder="Digite um usuario" name="usuario" id="usuario" require>
                <br />
                <input class="form-control" type="text" placeholder="Digite uma senha" name="senha" id="senha" require>
                <br />
                <button class="btn btn-success">CADASTRAR</button>
            </form>
        </div>
    </div>
</div>


<?php
include('../componentes/footer.php');
?>