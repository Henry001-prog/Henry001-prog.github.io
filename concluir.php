<body>
<?php
	
	
	include_once "conecta_mysql.inc";
	
		$codigo = $_POST['codigo'];
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$preco = $_POST['preco'];
		$peso = $_POST['peso'];
		$cc = $_POST['cc'];
		$cs = $_POST['cs'];
		$ad = $_POST['ad'];
		
	{
		
		include_once 'conecta_mysql.inc';  
		
		$resultado = mysqli_query($conexao, "update produtos set nome='$nome',descricao='$descricao',preco='$preco',peso='$peso',cc='$cc',cs='$cs',ad='$ad' where codigo='$codigo';");
		$resultado4 = mysqli_query($conexao, $resultado);
		mysqli_error($conexao);
		if($resultado)
		
			echo "Alterado com sucesso!"."<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo time(); ?>'>";
			
			
	}	
		mysqli_close($conexao);
?> 
<script>
window.location='administra1.html';alert('Suas alterações foram feitas com sucesso! Você será redirecionado para a página principal!');
</script>
</body>
