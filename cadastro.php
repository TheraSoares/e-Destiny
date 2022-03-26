<?php

if (isset($logged)) {
	header("Location: ./");
}

include_once("conexao.php");
$con = new Conexao();

include_once('menu.php');
$menu = new Menu();

if (isset($_POST['registrar'])) {
	$pfpj = $_POST['pfpj'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$grupo = $_POST['gp'];
	if ($grupo == '2') {
		$sgrupo = $_POST['sgp'];
	}
	

	$verify = mysqli_query($con->getDB(), "SELECT * FROM `cadastro` WHERE pfpj = $pfpj");


	if (strlen($nome) < 3) {
		$error = "<h6 style = 'color: red'>Nome muito pequeno</h6>";
	} else if (strlen($email) < 8) {
		$error = "<h6 style = 'color: red'>E-mail muito pequeno</h6>";
	} else if (strlen($pass) < 8) {
		$error = "<h6 sttle = 'color: red'>Senha muito pequena</h6>";
	} else if ($pass != $cpass) {
		$error = "<h6 style = 'color: red'>As senhas não são iguais</h6>";
	} else if (mysqli_num_rows($verify) > 0) {
		$error = "<h6 style = 'color: red'>E-mail já cadastrado</h6>";
	} else {
		$hash = bin2hex(random_bytes(12));

		$query = mysqli_query($con->getDB(), "SELECT hash FROM `cadastro` WHERE hash = '$hash'");

		if (mysqli_num_rows($query) < 1) {
			mysqli_query($con->getDB(), "INSERT INTO `cadastro` (`pfpj`,`nome`, `email`, `senha`,`hash`) VALUES ('$nome', '$nasc','$email','$pass','$hash')");
			$error = "<h6 style ='color : green'>Registrado com sucesso!</h6>";
		} else {
			return $hash;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php $menu->getHead(); ?>
	<title>Formulários</title>
</head>

<body>

	<div class="container">

		<div class="page-header">
			<h1>Cadastre-se</h1>
		</div>

		<div class="row">
			<div class="col-sm-8">
				<form>
					<div class="form-group">
						<label for="nome">CPF ou CNPJ</label>
						<input type="text" class="form-control" id="nome">
					</div>
					<div class="form-group">
						<label for="nome">Nome ou razão social</label>
						<input type="text" class="form-control" id="nome">
					</div>

					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" id="email">
					</div>

					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="email" class="form-control" id="senha">
					</div>
					<div class="form-group">
						<label for="senha">Confirme sua senha</label>
						<input type="email" class="form-control" id="senha">
					</div>
					
					<div class="checkbox">
						<select name="grupo" > 
							<option  value="1">Quero reciclar</option>
							<option  value="2">Quero descartar</option>
						</select>
						
					</div>
					<div class="checkbox">
						<select name="sgrupo" > 
							<option  value="1">Compro residuos.</option>
							<option  value="2">Recebo doações de residuos.</option>
						</select>
						
					</div>
					<div class="checkbox">
						<label>
							<input name= "sgrupo" type="checkbox"> Aceito os termos do serviço.
						</label>
					</div>



					<button type="submit" class="btn btn-default">Cadastrar</button>

				</form>

			</div>

		</div>

	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>