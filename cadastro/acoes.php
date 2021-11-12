<?php
session_start();
/*CONEXÃO COM BANCO DE DADOS*/
require('../database/conexao.php');

/*FUNÇÃO DE VALIDAÇÃO*/
function validaCampos(){

    $erros = [];

    if(!isset($_POST['nome']) || $_POST['nome'] == "" ){
        $erros[] = "O campo nome é de preenchimento obrigatório";
    }
    if(!isset($_POST['sobrenome'])|| $_POST['sobrenome'] == "" ){
        $erros[] = "O campo sobrenome é de preenchimento obrigatório";
    }
    if(!isset($_POST['email'])|| $_POST['email'] == "" ){
        $erros[] = "O campo email é de preenchimento obrigatório";
    }
    if(!isset($_POST['celular'])|| $_POST['celular'] == "" ){
        $erros[] = "O campo celular é de preenchimento obrigatório";
    }
    return $erros;

}

switch ($_POST['acao']) {

    case 'inserir':

        //CHAMADA DA FUNÇÃO DE VALIDAÇÃO DE ERROS:
        $erros = validaCampos();

        //VERIFICAR SE EXISTEM ERROS:
        if(count($erros) > 0){
            $_SESSION["erros"] = $erros;
            header('location: index.php');
            exit();
        }

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];

        /*MONTGEM DA INSTRUÇÃO SQL DE INSERÇÃO DE DADOS:*/
        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular)
        VALUES ('$nome', '$sobrenome', '$email', '$celular')";

        $resultado = mysqli_query($conexao, $sql);

        header('location: ../index.php');

        break;

        case 'deletar':

            $cod_pessoa = $_POST["cod_pessoa"];

            $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

            $resultado = mysqli_query($conexao, $sql);

            header('location: ../index.php');

            break;

        case 'editar':

            //CHAMADA DA FUNÇÃO DE VALIDAÇÃO DE ERROS:
        $erros = validaCampos();

        //VERIFICAR SE EXISTEM ERROS:
        if(count($erros) > 0){
            $_SESSION["erros"] = $erros;
            header('location: ../index.php');
            exit();
        }

        $cod_pessoa = $_POST["cod_pessoa"];
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        $sql = "UPDATE tbl_pessoa SET 
        nome = '$nome', 
        sobrenome = '$sobrenome', 
        email = '$email', 
        celular = '$celular' 
        WHERE cod_pessoa = $cod_pessoa";
        // echo $sql; exit;
        
        $resultado = mysqli_query($conexao, $sql);

        header('location: ../index.php');

        break;
    
    default:
        # code...
        break;
}
