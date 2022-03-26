<?php

session_start();

include_once('conexao.php');

class Funcoes extends Conexao
{
    function __construct()
    {
        $this->setEntrada();
    }

    function setEntrada()
    {
        if (isset($_POST['btn_entrar'])) {
            $this->getEntrar();

        } else {
            header("Location:../index.php");
        }
    }

    function getEntrar()
    {   /* validando formulário de entrada */
        /* verifica se existe os campos */
        if (isset($_POST['usuario']) && isset($_POST['senha'])) {
            $usuario = $_POST['usuario'];
            $senha = MD5($_POST['senha']);
        }
        /* buscando a lista de usuarios cadastrados no banco */
        $query_select = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

        $verifica = mysqli_query($this->getDB(), $query_select)
            or die("erro ao selecionar");

        if (mysqli_num_rows($verifica) <= 0) {
            echo    "<script language='javascript' type='text/javascript'>
                    alert('001 - Usuário e/ou senha incorreto!');
                    window.location.href='login.php';
                    </script>";
            die();
        } else {

            $_SESSION['ativo'] = true;
            $_SESSION['usuario'] = $usuario;

            $userAtivo = "UPDATE usuarios 
                            SET ativo = 1
                            WHERE  usuario =  '$usuario'";
            mysqli_query($this->getDB(), $userAtivo);

            $select_dados_usuario = "SELECT * 
                                FROM usuarios 
                                WHERE usuario = '$usuario'";

            $query_dados_usuario = mysqli_query($this->getDB(), $select_dados_usuario);
            $row_dados_usuario = mysqli_fetch_assoc($query_dados_usuario);

            $_SESSION['centro'] = $row_dados_usuario['centro'];
            $_SESSION['id'] = $row_dados_usuario['id'];

            /* Direcionando para a pagina inicial */
            header("Location:../index.php");
        }
    }
}
$funcao = new Funcoes();
