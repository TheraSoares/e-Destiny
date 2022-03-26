<?php
/*Criação dos objetos pro banco de dados e para as funções da classe Menu*/
include_once('menu.php');
$menu = new Menu();
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	}
	

		$query = mysqli_query($con->getDB(), "SELECT hash FROM `cadastro` WHERE hash = '$hash'");
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>Custo - Login</title>
    <?php $menu->getHead(); 
    include_once("conexao.php");
    $con = new Conexao();?>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Login Form -->
            <form method="post">
                <div class="form-group col-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email">
                </div>

                <div class="form-group col-3">
                    <label for="senha">Senha</label>
                    <input type="email" class="form-control" id="senha">
                </div>
                <input type="submit" class="btn" id="btn_entrar" name="btn_entrar" value="Entrar">
            </form>
        </div>
    </div>
    <?php $menu->getFooter(); ?>

</body>

</html>