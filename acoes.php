<?php

    require("database/conexao.php");

    if (isset($_POST['acao'])) 
    {
        switch ($_POST["acao"]) 
        {
            case 'cadastrar':

                //VALIDAR OS DADOS

                //RECEBER OS DADOS
                    $nome = $_POST["nome"];
                    $sobrenome = $_POST["sobrenome"];
                    $email = $_POST["email"];
                    $celular = $_POST["celular"];

                //INSERÇÃO DOS DADOS NO BCD
                    #criação da instrução
                        $instrucaoSqlInsercao = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) VALUES ('$nome', '$sobrenome', '$email', '$celular');";

                    #execução da instrucao
                        $resultadoEdicao = mysqli_query($conexao, $instrucaoSqlInsercao);
                        // var_dump($resultadoEdicao);

                    #redirecionamento
                        header("location: index.php");

                break;

            case 'excluir':
                //RECEBER OS DADOS
                    $idExclusao = null;

                    if (isset($_POST["id"])) 
                    {$idExclusao = $_POST["id"];
                    }

                //EXCLUSAO DOS DADOS NO BCD
                    #criação da instrução
                        $instrucaoSqlExclusao = "DELETE FROM tbl_pessoa WHERE (cod_pessoa = $idExclusao);";

                    #execução da instrucao
                        $resultadoExclusao = mysqli_query($conexao, $instrucaoSqlExclusao);
                        // var_dump($resultadoExclusao);

                    #redirecionamento
                        header("location: index.php");

                break;

            case 'editar' :

                //RECEBENDO DADOS DA EDICAO
                    $idPessoaEditada = $_POST['id'];
                    $nomePessoaEditada = $_POST['nome'];
                    $sobrenomePessoaEditada = $_POST['sobrenome'];
                    $emailPessoaEditada = $_POST['email'];
                    $celularlPessoaEditada = $_POST['celular'];

                // var_dump($_POST);exit;

                //FAZENDO ATUALIZAÇÃO NO BCD
                    #criação da instrução
                        $instrucaoSqlEdicao = "UPDATE tbl_pessoa SET nome = '$nomePessoaEditada', sobrenome = '$sobrenomePessoaEditada', email = '$emailPessoaEditada', celular = '$celularlPessoaEditada' WHERE cod_pessoa = $idPessoaEditada;";
                    #execução da instrução
                        $resultadoEdicao = mysqli_query($conexao, $instrucaoSqlEdicao);
                        
                    #redirecionamento
                        header("location: index.php");

                break;

            default:
                # code...
                break;
        }
    }

    function listarPessoas ($conexao)
    {
        //MONTAGEM DA INSTRUÇÃO SQL
            $instrucaoListarSql = "SELECT * FROM tbl_pessoa;";
        
        //EXECUÇÃO DA INSTRUCAO SQL
            $resultado = mysqli_query($conexao,$instrucaoListarSql);
        //RETORNO DOS RESULTADOS
            return $resultado;
    }

    function listarPessoaPeloId ($conexao, $idPessoa)
    {
        //MONTAGEM DA INSTRUÇÃO SQL
            $instrucaoListarSql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $idPessoa;";
        
        //EXECUÇÃO DA INSTRUCAO SQL
            $resultado = mysqli_query($conexao,$instrucaoListarSql);
        //RETORNO DOS RESULTADOS
            return $resultado;
    }





?>