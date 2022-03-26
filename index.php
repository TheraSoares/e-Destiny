<?php

//session_cache_expire(60);
//session_start();

include_once('menu.php');
//include_once('conexao.php');

$menu = new Menu();
/**
 * if (!$_SESSION['ativo']) {
 *     header("Location:../login.php");
 * } else {
 *     $logado = $_SESSION['ativo'];
 * 
 *     if (!empty($logado)) {
 *         $objDB = new Conexao();
 */

/* Continua apos o HTML */

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <title>Eco Tech</title>
        <?php $menu->getHead(); ?>
    </head>
    <body>
        <?php $menu->getNavbar(); ?>
        
        <section class='container col-10'>
            <legend class="title h1 text-center mb-4 mt-4">Eco Tech</legend>
            
            <div class='row'>
                <h1>Aqui será colocado o conteúdo.</h1>
            </div>
        </section>
        <?php $menu->getFooter(); ?>
    </body>
</html>