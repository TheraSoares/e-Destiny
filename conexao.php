<?php

class Conexao {
	
	private $host     = "localhost";
    private $database   = "eco";
    private $usuario   = "root";
    private $senha   = "";

	function __construct(){}

	function getDB(){
		/*criar a conexão*/
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		/*ajustar o charset de comunicação entre a aplicação e o banco de dados*/
		mysqli_set_charset($con, "utf8");

		/*verificar se houve erro de conexao*/
		if(mysqli_connect_errno()){
			echo "Erro ao tentar conectar-se com o banco de dados".mysqli_connect_error();
		}
		return $con;
	}
}
?>