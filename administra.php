<?php

/*Programa de Formulário
@author Alisson Henrique*/
 
	$operacao = $_POST["operacao"];
	include "conecta_mysql.inc";
	if($operacao=="incluir")
	{
		$codigo = $_POST['codigo'];
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$preco = $_POST['preco'];
		$peso = $_POST['peso'];
		$cc = $_POST['cc'];
		$cs = $_POST['cs'];
		$ad = $_POST['ad'];
		
		$sql ="insert into produtos (codigo,nome,descricao,preco,peso,cc,cs,ad) values  ({$codigo},'{$nome}','{$descricao}','{$preco}','{$peso}','{$cc}','{$cs}','{$ad}')";
		$resultado = mysqli_query($conexao, $sql);
		if($resultado)
			echo "Inserido com sucesso!"."<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo time(); ?>'>";
		else 
			echo mysqli_error($conexao)."<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo time(); ?>'>";
		
	}	
		
		elseif($operacao=="excluir")
	{
		$codigo = ($_POST["codigo"]);
		$sql = ("delete from produtos where codigo = $codigo");
		$resultado = mysqli_query ($conexao, $sql);
		$linhas = mysqli_affected_rows($conexao);
		if($linhas==1)
		{ echo "Produto excluído com sucesso!"."<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo time(); ?>'>"; }
		else
		{ echo "Produto não encontrado!"."<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo time(); ?>'>"; }
	}
	
	elseif($operacao=="mostrar")
	{
		$resultado = mysqli_query ($conexao,"select * from produtos");
		$linhas = mysqli_affected_rows ($conexao);
		echo "<p><b>Lista de produtos da loja</b></p>";
		for ($i=0; $i<$linhas; $i++)
		{
			$reg = mysqli_fetch_row($resultado);
			echo "<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo date('his'); ?>"."<p>Código: $reg[0]<br> Produto: $reg[1]<br> Descrição: $reg[2]<br> Preço: $reg[3]<br>";
			echo "Peso: $reg[4]<br> Código da Categoria: $reg[5]<br> Código da Subcategoria: $reg[6]<br> Inf. Adicionais: $reg[7]<br></p>";
		}
	}
		
		mysqli_close($conexao);
		
?>