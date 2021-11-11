<?php

session_start();

require('../../database/conexao.php');

### FUNCOES DE LOGIN/LOGOUT ###

function realizarLogin($usuario, $senha, $conexao)
{

    $sql = "SELECT * FROM tbl_administrador
            WHERE usuario = '$usuario'";



    $resultado = mysqli_query($conexao, $sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if (isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"]) && password_verify($senha, $dadosUsuario["senha"])) {
        // echo 'LOGADO!';

        $_SESSION["usuarioId"] = $dadosUsuario["id"];
        $_SESSION["nome"] = $dadosUsuario["nome"];

        echo  $_SESSION["usuarioId"];
        echo $_SESSION["nome"];

        header("location: ../../produtos/index.php");
    } else {
        header("location: ../../produtos/index.php");
    }
}

switch ($_POST["acao"]) {
    case 'login':
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        // var_dump($_POST);

        RealizarLogin($usuario, $senha, $conexao);

        break;

    case 'logout':

        // echo "logout";

        session_destroy();

        header("location: ../../produtos/index.php");

    default:
        # code...
        break;
}
