<?php
session_start();

require('../database/conexao.php');

if (
    isset($_POST['acao'])
) {

    switch ($_POST['acao']) {
        case 'login':

            $usuario = $_POST['txt_usuario'];
            $senha = $_POST['txt_senha'];

            realizarLogin($usuario, $senha, $conexao);
            exit;

        case 'logout':
            session_destroy();
            session_unset();
            header('location: ./index.php');
            break;

        case 'sign up':
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $celular = $_POST['celular'];

            realizarCadastro($usuario, $senha, $nome, $sobrenome, $email, $celular, $conexao);

            $_SESSION['usuario'] = $usuario;
            $_SESSION['idSessao'] = session_id();
            $_SESSION['data_hora_autenticacao'] = date('d/m/Y - h:i:s');
            $_SESSION["idAdministrador"] = $dadosUsuario['idAdministrador'];

            header('location: ./index.php');
            break;


        default:
            # code...
            break;
    }
}

// header("Location: ../../produtos");

function realizarCadastro($usuario, $senha, $nome, $sobrenome, $email, $celular, $conexao)
{

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbladministrador (nome, sobrenome, email, celular, usuario, senha) 
            VALUES 
            ('$usuario', '$sobrenome',  '$email', '$celular', '$usuario', '$senhaCriptografada')";

    $resultado = mysqli_query($conexao, $sql);
}

function realizarLogin($usuario, $senha, $conexao)
{

    $sql = "SELECT * FROM tbladministrador WHERE usuario = '$usuario'";

    $resultado = mysqli_query($conexao, $sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if (isset($dadosUsuario['usuario']) && isset($dadosUsuario['senha']) && password_verify($senha, $dadosUsuario['senha'])) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['idSessao'] = session_id();
        $_SESSION['data_hora_autenticacao'] = date('d/m/Y - h:i:s');
        $_SESSION["idAdministrador"] = $dadosUsuario['idAdministrador'];

        header('location: ../index.php');
    } else {
        session_destroy();
        session_unset();
        header('location: ./index.php');
    }
}
