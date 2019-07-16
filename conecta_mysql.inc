<?php 
	$conexao = mysqli_connect("localhost","root","","loja");
	
	mysqli_set_charset($conexao, "utf8");
	
	if(mysqli_connect_errno()){
		echo "falha ao conectar: ". mysqli_connect_error();
	die();
}
?> 
