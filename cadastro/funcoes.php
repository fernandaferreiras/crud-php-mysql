<?php

session_start();

require("../database/conexao.php");


switch ($_POST["acao"]) {

    case 'inserir':

        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, usuario, senha) 
                VALUES ('$nome', '$sobrenome', '$email', '$celular', '$usuario', '$senha' )";

        $resultado = mysqli_query($conexao, $sql);

        header('location: index.php');

        break;

    case "deletar":

        $cod_pessoa = $_POST["cod_pessoa"];

        $resultado = mysqli_query($conexao, $sql);

        $produto = mysqli_fetch_array($resultado);

        // echo $produto[0];exit;

        $sql = "DELETE FROM tbl_pessoa WHERE id = '$cod_pessoa'";

        $resultado = mysqli_query($conexao, $sql);

        header("location: ../listagem/");

        break;

    default:
        # code...
        break;
}
