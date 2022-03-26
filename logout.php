<?php
include_once('conexao.php');
$objDB = new Conexao();
$link = $objDB->getDB();

/* Iniciando a sessão */
session_start();

$user = $_SESSION['usuario'];

$userAtivo = "UPDATE usuarios SET ativo = 0 WHERE usuario =  '$user'";

mysqli_query($link, $userAtivo);

/* Apagando todos os dados de uma sessão*/
session_unset();
/* Destruindo todas as sessões */
session_destroy();
/* Direciona para pagina de login */
header("Location:login.php");

?>